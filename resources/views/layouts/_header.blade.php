<!-- header section strats -->
<header class="header_section" id="header">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="YellowTech Logo" />
                <span class="text-dark">YellowTech</span>
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
                        <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('service') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('service') }}">
                                Services
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('portfolio') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('portfolio') }}">
                                Portfolio
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->