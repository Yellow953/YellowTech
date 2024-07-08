<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Admin</b>YellowTech</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu d-flex">
            <form action="{{ route('navigate') }}" method="POST" enctype="multipart/form-data" id="redirectForm"
                class="my-auto">
                @csrf
                <input type="hidden" name="route" value="">
                <input type="text" name="routes-search" id="routes-search" class="typeahead tt-query" autocomplete="off"
                    spellcheck="false" value="{{ request()->query('routes-search') }}" style="width: 250px;">
            </form>

            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa-solid fa-user"></i>
                        <span class="mx-3 hidden-xs">{{ ucwords(auth()->user()->name) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets/images/default_profile.png') }}" alt="Default Profile"
                                class="border-none">
                            <p class="text-dark">{{ ucwords(auth()->user()->name) }} ({{ ucwords(auth()->user()->role)
                                }})</p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="{{ route('users.edit', auth()->user()->id) }}">Edit</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="{{ route('password.request') }}">Change Password</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="{{ route('custom_logout') }}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>