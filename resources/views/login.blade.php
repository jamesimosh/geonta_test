<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>GeontaTest</title>
        
        <!-- Vendors Style-->
        <link rel="stylesheet" href="{{ asset("/css/vendors_css.css") }}">
        
        <!-- Style-->    
        <link rel="stylesheet" href="{{ asset("/css/style.css") }}">
        <link rel="stylesheet" href="{{ asset("/css/skin_color.css") }}">
    </head>

    <body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('/images/auth-bg/bg-1.html') }})">
        <div class="container h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">	
                
                <div class="col-12">
                    <div class="row justify-content-center g-0">
                        @if (isset($default))
                            {!! $default !!}                            
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>


        <!-- Vendor JS -->
        <script src="{{ asset("/js/vendors.min.js") }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
</html>
