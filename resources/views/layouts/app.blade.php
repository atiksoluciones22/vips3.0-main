<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/19a1f7c413.js" crossorigin="anonymous"></script>

    <!-- Verificar si puedo buscar la forma de eliminar esta linea -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="{{ asset('plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href='{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}' rel='stylesheet'>
    <link href='{{ asset('plugins/daterangepicker/daterangepicker.css') }}' rel='stylesheet'>
    <link href='{{ asset('plugins/toastr/toastr.min.css') }}' rel='stylesheet'>
    <script src="{{ asset('plugins/nprogress/nprogress.js') }}"></script>
    <link href='{{ asset('plugins/ladda/ladda.min.css') }}' rel='stylesheet'>
    <link id="sleek-css" rel="stylesheet" href="{{ asset('css/sleek.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
    @yield('head')
</head>

<body>
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>

    @include('sweetalert::alert')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

    <div id="app">
        <header class="sidebar" id="sidebar">
            <nav class="top-nav">
                <ul>
                    <li><a href="{{ route('dashboard') }}"><i class="fa-sharp fa-regular fa-circle-left"></i> Atras</a></li>
                    <li><a href="{{ route('settings') }}" class="{{ request()->routeIs('settings') ? 'active' : '' }}"><i class="fa-solid fa-gear"></i> Configuración</a></li>
                </ul>
            </nav>

            <nav class="nav">
                <li><a href="{{ route('user.information') }}" class="{{ request()->routeIs('user.information') ? 'active' : '' }}">Datos personales</a></li>

                <li><a href="{{ route('trainings.index') }}" class="{{ request()->routeIs('trainings.*') ? 'active' : '' }}">Entrenamientos</a></li>

                <li><a href="{{ route('requests.index') }}" class="{{ request()->routeIs('requests.*') ? 'active' : '' }}">Solicitudes</a></li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </nav>

            <div class="sidebar-overlay" id="sidebar-overlay"></div>
        </header>

        <main>
            <div class="wrapper">
                <nav class="navbar">
                    <button id="sidebar-toggler" class="sidebar-toggle" onclick="toggleSidebar()">
                        <span class="sr-only">Toggle Sidebar</span>
                    </button>

                    <div class="profile">
                        <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                        </svg>
                        <strong>{{ auth()->user()->NOMCOM }}</strong>
                    </div>
                </nav>

                <div class="p-3 overflow-auto">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src='{{ asset('plugins/charts/Chart.min.js') }}'></script>
    <script src='{{ asset('js/chart.js') }}'></script>
    <script src='{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}'></script>
    <script src='{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill.js') }}'></script>
    <script src='{{ asset('plugins/daterangepicker/moment.min.js') }}'></script>
    <script src='{{ asset('plugins/daterangepicker/daterangepicker.js') }}'></script>
    <script src='{{ asset('js/date-range.js') }}'></script>
    <script src='{{ asset('plugins/toastr/toastr.min.js') }}'></script>
    <script src="{{ asset('js/sleek.js') }}"></script>
    <script src='{{ asset('plugins/ladda/spin.min.js') }}'></script>
    <script src='{{ asset('plugins/ladda/ladda.min.js') }}'></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
    @yield('scripts')
</body>

</html>
