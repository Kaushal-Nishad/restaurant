<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kitchen > {{$siteInfo->app_title}}</title>
     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- Waves Effect Css -->
    <link rel="stylesheet" href="{{asset('assets/css/waves.css')}}">

    <!-- Animation Css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
     <!-- Sweetalert -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>
<body class="login-page" >
    <div class="login-box bg-blue" id="login">
        <div class="logo">
            <a href="javascript:void(0);">Kitchen<b>LOGIN</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form action="/kitchen" id="kitchenLogin" method="POST">
                    @csrf
                    <input type="hidden" class="url" value="{{url('/kitchen')}}">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username"  required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="text" id="url" value="{{url('/')}}" hidden>
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    
    <!-- Bootstrap Core Js -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('assets/js/waves.js')}}"></script>
   
    <!-- Validation Plugin Js -->
    <script src="{{asset('assets/js/jquery.validate.js')}}"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    
    <!-- Custom Js -->
    <script src="{{asset('assets/js/admin.js')}}"></script>
    <script src="{{asset('assets/js/sign-in.js')}}"></script>
    <script src="{{asset('assets/js/kitchenLogin.js')}}"></script>
    </body>
</html>
