<input type="text" id="url" hidden value="{{url('/')}}" hidden>
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <!-- Select Plugin Js -->
    <script src="{{asset('assets/js/bootstrap-select.js')}}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <!-- Validation Plugin Js -->
    <script src="{{asset('assets/js/jquery.validate.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/admin.js')}}"></script>
    <script src="{{asset('assets/js/sign-in.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <!--Vue Js -->
    <script src="{{asset('assets/js/kitchenLogin.js')}}"></script> 
    @yield('pageJsScripts')
</body>
</html>