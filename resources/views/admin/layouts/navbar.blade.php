<nav class="navbar navbar-expand-lg navbar-dark bg-grandient shadow-sm sticky-top">

    <div class="container-fluid px-4">

        <a class="navbar-brand fw-bold text-warning fs-3" href="{{ route('admin.dashboard') }}">EminTech Admin</a>



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar"
            aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse" id="adminNavbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">{{ __('app.dashboard') }}</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">{{ __('app.products') }}</a>

                </li>

            </ul>



            <div class="d-flex align-items-center gap-3 ms-auto">

                <form class="d-flex" role="search" method="GET" action="{{ route('admin.products.index') }}">

                    <input class="form-control form-control-sm me-2 bg-white text-dark border-light placeholder-light"
                        type="search" placeholder="{{ __('app.search_placeholder') }}" aria-label="Search" name="search"
                        value="{{ request('search') }}">

                    <button class="btn btn-outline-light btn-sm" type="submit">{{ __('app.search') }}</button>

                </form>



                <div class="dropdown">

                    <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        {{ strtoupper(app()->getLocale()) }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">

                        <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}"><img class="w-25 me-2"
                                    src="{{ asset('img/tm.png') }}">Türkmençe</a></li>

                        <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}"><img class="w-25 me-2"
                                    src="{{ asset('img/ru.png') }}">Русский</a></li>

                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}"><img class="w-25 me-2"
                                    src="{{ asset('img/en.png') }}">English</a></li>

                    </ul>

                </div>



                <form action="{{ route('admin.logout') }}" method="POST" class="m-0">

                    @csrf

                    <button type="submit" class="btn btn-outline-light btn-sm">{{ __('app.logout') }}</button>

                </form>

            </div>

        </div>

    </div>

</nav>
