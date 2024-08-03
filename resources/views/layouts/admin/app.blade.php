<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d9e3adf935.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/admin/css/mdb.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/card.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/lightbox.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/akramha-logo.png') }}">

    <style>
        .mdb-docs-layout {
            padding-right: 240px;
        }

        @media (max-width: 1440px) {
            .mdb-docs-layout {
                padding-right: 0px;
            }
        }

        .bg-primary-demo {
            background-color: #098d99 !important;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            /* For right-to-left text direction */
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
        }

        p {
            font-weight: 400;
        }



    </style>

    @livewireStyles()
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</head>

<body>
    <header>
        @include('partials.admin.sidenav')
        @include('partials.admin.navbar')
    </header>
    <main id="main-screen" class="pt-4 mdb-docs-layout">
        {{ $slot }}
    </main>


    <script type="text/javascript" src="{{ asset('assets/admin/js/new-prism.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/popper.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            const sidenav = document.getElementById("sidenav-1");
            const instance = mdb.Sidenav.getInstance(sidenav);

            let innerWidth = null;

            const setMode = (e) => {
                // Check necessary for Android devices
                if (window.innerWidth === innerWidth) {
                    return;
                }

                innerWidth = window.innerWidth;

                if (window.innerWidth < 1700) {
                    instance.changeMode("over");
                    instance.hide();
                } else {
                    instance.changeMode("side");
                    instance.show();
                }
            };

            setMode();

            // Event listeners
            window.addEventListener("resize", setMode);
        });
    </script>

    @livewireScripts()

    @stack('modal-script')

</body>

</html>