<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        @include('partials.header')

        <main class="">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item m-2">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'admin.dashboard') active @endif"
                                        aria-current="page">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="{{ route('admin.projects.index') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'admin.projects.index') active @endif"
                                        aria-current="page">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="{{ route('admin.types.index') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'admin.types.index') active @endif"
                                        aria-current="page">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Types
                                    </a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="{{ route('admin.technologies.index') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'admin.technologies.index') active @endif"
                                        aria-current="page">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Technologies
                                    </a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="{{ route('admin.projects.create') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'admin.projects.create') active @endif"
                                        aria-current="page">
                                        <svg class="bi pe-none me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        Create
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10">
                        @yield('content')
                    </div>
                </div>




            </div>


        </main>

    </div>
</body>

</html>
