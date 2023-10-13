<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="role" content="{{ Auth::user()->role }}">
    <meta name="company-id" content="{{ Auth::user()->company_id }}">
    <meta name="sub-company-id" content="{{ Auth::user()->sub_comp_id}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.20/integration/font-awesome/dataTables.fontAwesome.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.3.1023/styles/kendo.default-v2.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />


    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link href="{{ asset('assets/DataTablesfull/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <!-- Custom fonts for this template-->

    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" media='screen,print'>
    <link href="{{asset('css/stellarnav.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet" />

    <link href="{{asset('publicvendors/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('publicvendors/datatables/datatables.min.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('modal6/fonts-m6/icomoon/style.css') }}">

    <!-- Bootstrap CSS -->
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('modal6/css-m6/style.css') }}" />

    <style>
        :root {
            --menu-bg-main: {
                    {
                    config('settings.primary_color')

                }
            };
            --menu-bg-item: {
                    {
                    config('settings.secondary_color')

                }
            };
        }
        .wrapper{
            max-height: calc(100vh - 128px);
        }
        .board-wrapper {
            contain: layout;
        }
        .board-wrapper {
            user-select: none;
            -webkit-user-select: none;
            cursor: default;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .header{
            width:100%;
            position: sticky;
            left:0;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100" id="app">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="pl-4 pr-4 mt-3">
            <router-view />
        </main>
    </div>

    <!-- Scroll to Top Button-->
{{--    <a class="scroll-to-top rounded" href="#page-top">--}}
{{--        <i class="fas fa-angle-up"></i>--}}
{{--    </a>--}}

    <!-- Core plugin JavaScript-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('modal6/js-m6/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('modal6/js-m6/popper.min.js') }}"></script>
    <script src="{{asset('modal6/js-m6/bootstrap.min.js') }}"></script>
    <script src="{{asset('modal6/js-m6/main.js') }}"></script>

    <script type="text/javascript" src="{{ asset('publicvendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('publicvendors/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <script src="https://kendo.cdn.telerik.com/2019.3.1023/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.3.1023/js/kendo.all.min.js"></script>

    <!-- Custom scripts for all Pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('js/stellarnav.min.js')}}"></script>

    <script src="{{ asset('js/jquery.inputmask.bundle.js')}}"></script>
    <script src="{{asset('assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js')}}"></script>

    <script src="{{asset('assets/plugins/fullside-menu/waves.min.js')}}"></script>

    <script src="{{asset('assets/plugins/notify/js/jquery.growl.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- Bootstrap core JavaScript-->

    <script src="{{asset('publicvendors/iro/iro.min.js')}}"></script>

    <script src="{{ asset('assets/DataTablesfull/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/DataTablesfull/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">
        function formatSizeUnits($bytes) {


            return $bytes;
        }
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('publicvendors/jquery-easing/jquery.easing.min.js')}}"></script>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery('.stellarnav').stellarNav({
                theme: 'dark', // adds default color to nav. (light, dark)
                breakpoint: 768, // number in pixels to determine when the nav should turn mobile friendly
                menuLabel: 'Menu', // label for the mobile nav
                sticky: true, // makes nav sticky on scroll (desktop only)
                position: 'top', // 'static', 'top', 'left', 'right' - when set to 'top', this forces the mobile nav to be placed absolutely on the very top of page
                openingSpeed: 300, // how fast the dropdown should open in milliseconds
                closingDelay: 50, // controls how long the dropdowns stay open for in milliseconds
                showArrows: true, // shows dropdown arrows next to the items that have sub menus
                phoneBtn: '923220008788', // adds a click-to-call phone link to the top of menu - i.e.: "18009084500"
                phoneLabel: 'Call Us', // label for the phone button
                locationBtn: '', // adds a location link to the top of menu - i.e.: "/location/", "http://site.com/contact-us/"
                locationLabel: 'Location', // label for the location button
                closeBtn: false, // adds a close button to the end of nav
                closeLabel: 'Close', // label for the close button
                mobileMode: false,
                scrollbarFix: false // fixes horizontal scrollbar issue on very long navs
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        child = $("#main-nav").find('.active').parent().parent().attr('child');
        if (child == 'child_menu') {
            $("#main-nav").find('.active').parent().parent().addClass('active');
            $("#main-nav").find('.active').parent().parent().parent().parent().addClass('active');
        } else {
            $("#main-nav").find('.active').parent().parent().addClass('active');
        }
    </script>
<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>


    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; {{ now()->year }} - {{ config('settings.site_title') }} , {{ config('settings.company_name') }}</span>
            </div>
        </div>
    </footer>

</body>

</html>
