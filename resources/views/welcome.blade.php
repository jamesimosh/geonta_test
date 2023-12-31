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
        <link rel="stylesheet" href="{{ asset("/css/horizontal-menu.css") }}"> 
        <link rel="stylesheet" href="{{ asset("/css/style.css") }}">
        <link rel="stylesheet" href="{{ asset("/css/skin_color.css") }}">
    </head>

    <body class="layout-top-nav light-skin theme-primary fixed">
        <div class="wrapper">
            <div id="loader"></div>
            @include('Partials.homeheader')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Main content -->
                    <section class="content">
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
        <!-- Vendor JS -->
        <script src="{{ asset("/js/vendors.min.js") }}"></script>
        <script src="{{ asset("/js/pages/chat-popup.js") }}"></script>
        <script src="{{ asset("/assets/icons/feather-icons/feather.min.js") }}"></script>	

        <script src="{{ asset("/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js") }}"></script>
        
        <!-- App -->
        <script src="{{ asset('/js/jquery.smartmenus.js') }}"></script>
        <script src="{{ asset('/js/menus.js') }}"></script>
        <script src="{{ asset('/js/template.js') }}"></script>
        <script src="{{ asset('/js/pages/dashboard.js') }}"></script>
        
    </body>
</html>
