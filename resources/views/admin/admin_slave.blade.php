<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href=" {{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href=" {{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=" {{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=" {{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
    <body class="auth-body-bg">

        @yield('content')

      <!-- JAVASCRIPT -->
      <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
      <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
      <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

      <script src="{{ asset('backend/assets/js/app.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;

               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;

               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;

               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break;
            }
            @endif
           </script>

  </body>
</html>
