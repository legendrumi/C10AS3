<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #2c3e50;">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold text-warning d-flex align-items-center gap-2 fs-2" href="{{ url('/') }}">
            <i class="bi bi-shop"></i> EminTech
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#clientNavbar"
            aria-controls="clientNavbar" aria-expanded="false" aria-label="Görkez">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="clientNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>

            <div class="ms-auto d-flex align-items-center gap-3">

                <div class="dropdown">
                    <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button"
                        data-bs-toggle="dropdown">
                        {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}"><img class="w-25 me-2" src="{{ asset("img/tm.png") }}">Türkmençe</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}"><img class="w-25 me-2" src="{{ asset("img/ru.png") }}">Русский</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}"><img class="w-25 me-2" src="{{ asset("img/en.png") }}">English</a></li>
                    </ul>
                </div>

                <a href="{{ route('wishlist.index') }}" class="btn btn-outline-light btn-sm position-relative">
                    <i class="bi bi-heart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $wishlistCount ?? 0 }}
                    </span>
                </a>

                <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-sm position-relative">
                    <i class="bi bi-cart3"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                        {{ $cartCount ?? 0 }}
                    </span>
                </a>

                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-person-lock"></i> Admin Login
                </a>
            </div>
        </div>
    </div>
</nav>
