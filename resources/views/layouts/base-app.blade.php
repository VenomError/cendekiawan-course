<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'Cendekiawan Course')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @stack('metadata')
        @livewireStyles
        @stack('head')

        <!-- Theme Config Js -->
        <x-script src="dashboard/assets/js/hyper-config.js"></x-script>

        <!-- App css -->
        <x-link
            href="dashboard/assets/css/app-saas.min.css"
            rel="stylesheet"
            type="text/css"
            id="app-style"
        />

        <!-- Icons css -->
        <x-link
            href="dashboard/assets/css/icons.min.css"
            rel="stylesheet"
            type="text/css"
        />
    </head>

    <body class="@yield('class')">

        @yield('content')

        @livewireScripts
        <!-- Vendor js -->
        <x-script src="dashboard/assets/js/vendor.min.js"></x-script>

        @stack('script')
        <!-- Remixicons Icons Demo js -->
        <x-script src="dashboard/assets/js/pages/demo.remixicons.js"></x-script>
        <!-- App js -->
        <x-script src="dashboard/assets/js/app.min.js"></x-script>

    </body>

</html>
