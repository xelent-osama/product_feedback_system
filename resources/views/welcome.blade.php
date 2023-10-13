<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
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

    <body class="antialiased">
       <div id="app">
           <router-view />
       </div>
    </body>
</html>
