<!-- header section strats -->
<header class="header_section" id="header">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="YellowTech Logo" />
                <h1 class="text-dark nav-link h1-header">YellowTech</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav">
                        <li class="nav-item  {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown {{ request()->is('shop') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach (Helper::get_categories() as $category)
                                <a class="dropdown-item" href="{{ route('shop', $category->name) }}">{{
                                    ucwords($category->name) }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li
                            class="nav-item dropdown {{ request()->is('service') ? 'active' : '' }} {{ request()->is('portfolio') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Software
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('service') }}">Services</a>
                                <a class="dropdown-item" href="{{ route('portfolio') }}">Portfolio</a>
                            </div>
                        </li>
                        <li
                            class="nav-item dropdown {{ request()->is('about') ? 'active' : '' }} {{ request()->is('contact') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('about') }}">About</a>
                                <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->is('cart') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('cart') }}">
                                Cart ({{ Helper::cart_count() }}) <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->