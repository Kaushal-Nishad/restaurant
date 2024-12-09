<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\OrderMenu;
use App\Models\Reservation;
use App\Models\CustomerList;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request){
        
		if($request->input()){

			$request->validate([
				'username'=>'required',
				'password'=>'required',
			]); 
			// return Hash::make($request->input('password'));
		
			$login = Admin::where(['username'=>$request->username])->pluck('password')->first();
			
			if(empty($login)){
				return response()->json(['error'=>'Username Does not Exists']);
			}else{
				if(!Hash::check($request->password,$login)){
					return response()->json(['error'=>'Username and Password does not matched']);
				}else{
					$admin = Admin::first();
					$request->session()->put('admin','1');
					$request->session()->put('admin_name',$admin->admin_name);
					$request->session()->put('email',$admin->email); 
					return response()->json(['success'=>'Logged In Succesfully']);
				}
			}
		}else{
			return view('admin.admin');
		}
    }

    public function dashboard(){
		$date = date('Y-m-d');
        $data['today_orders'] = OrderMenu::where('status','2')->whereDate('created_at',$date)->count('id');
        $data['today_sales'] = OrderMenu::where('status','2')->whereDate('created_at',$date)->sum('net_amount');
        $data['reservations'] = Reservation::count('reservation_id');
        $data['customers'] = CustomerList::count('customer_id');
        $data['latest_orders'] = OrderMenu::select(['order_lists.*','customer_lists.customer_name','table_lists.table_name'])
					->leftJoin('customer_lists','order_lists.customer','=','customer_lists.customer_id')
					->leftJoin('table_lists','order_lists.table','=','table_lists.table_id')
					// ->groupBy('order_lists.id')
					->orderBy('order_lists.id','desc')
					->limit(5)
					->latest()
					->get();
        $data['latest_reservations'] = Reservation::select(['reservations.*','table_lists.table_name','customer_lists.customer_name'])
					->LeftJoin('table_lists','reservations.table_id','=','table_lists.table_id')
					->LeftJoin('customer_lists','reservations.customer_id','=','customer_lists.customer_id')
					->orderBy('reservations.reservation_id','desc')
					->limit(5)
					->latest()
					->get();

        return view('admin.dashboard',$data);
        
	}
	
	public function logout(Request $req) {
		Auth::logout();
		session()->forget('admin');
		session()->forget('admin_name');
		session()->forget('email');
		return response()->json(['success'=>'1']);
	}

	public function changePassword(Request $request){
		if($request->input()){
			$request->validate([
                'password'=> 'required',
                'new'=> 'required',
                'new_confirm'=> 'required',
            ]);

            $get_admin = DB::table('admins')->first();

            if(Hash::check($request->password,$get_admin->password)){
                DB::table('admins')->update([
                    'password'=>Hash::make($request->new)
                ]);
				return '1';
			}else{
				return 'Please Enter Correct Current Password';
			}
		}else{
			return view('admin.change-password');
		}
	}

}
