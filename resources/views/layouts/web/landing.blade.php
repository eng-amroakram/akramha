<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اكرمها</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d9e3adf935.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    {{-- Icon Website --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/akramha-logo.png') }}">

    {{-- MDB CSS Styles --}}

    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/core.rtl.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/mdb.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/card.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/modals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mdb/pro/css/lightbox.css') }}">

    <style>
        .mdb-docs-layout {
            padding-right: 240px;
        }

        @media (max-width: 1440px) {
            .mdb-docs-layout {
                padding-right: 0px;
            }
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

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .icon-container {
            padding: 1rem;
            font-size: 2rem;
            color: #fff;
            text-align: left;
            border-radius: 10px;
        }


    </style>
    @livewireStyles()
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</head>

<body>

    @yield('content')


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
</body>

</html>
