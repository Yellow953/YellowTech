<aside class="main-sidebar" id="sidenav-main" style="position: fixed">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">SHOP</li>
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }} treeview">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('categories*') ? 'active' : '' }}">
                <a href="{{ route('categories')}}">
                    <i class="fa-solid fa-table-cells"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('products*') ? 'active' : '' }}">
                <a href="{{ route('products')}}">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('orders*') ? 'active' : '' }}">
                <a href="{{ route('orders')}}">
                    <i class="fa-solid fa-folder-plus"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('promos*') ? 'active' : '' }}">
                <a href="{{ route('promos')}}">
                    <i class="fa-solid fa-rectangle-ad"></i>
                    <span>Promos</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('notifications*') ? 'active' : '' }}">
                <a href="{{ route('notifications') }}">
                    <i class="fa-solid fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <li class="header">SYSTEM</li>
            <li class="treeview {{ request()->routeIs('todo*') ? 'active' : '' }}">
                <a href="{{ route('todo')}}">
                    <i class="fa-solid fa-check"></i>
                    <span>TODO</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('calendar*') ? 'active' : '' }}">
                <a href="{{ route('calendar')}}">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Calendar</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('projects*') ? 'active' : '' }}">
                <a href="{{ route('projects')}}">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('invoices*') ? 'active' : '' }}">
                <a href="{{ route('invoices')}}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>Invoices</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('tickets*') ? 'active' : '' }}">
                <a href="{{ route('tickets')}}">
                    <i class="fa-solid fa-ticket"></i>
                    <span>Tickets</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('users*') ? 'active' : '' }}">
                <a href="{{ route('users') }}">
                    <i class="fa-solid fa-users"></i>
                    <span> Users</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('logs*') ? 'active' : '' }}">
                <a href="{{ route('logs')}}">
                    <i class="fa-regular fa-note-sticky"></i>
                    <span>Logs</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('backup*') ? 'active' : '' }}">
                <a href="{{ route('backup')}}">
                    <i class="fa-solid fa-database"></i>
                    <span>Backup</span>
                </a>
            </li>
            <li class="treeview {{ request()->routeIs('analytics*') ? 'active' : '' }}">
                <a href="{{ route('analytics')}}">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Analytics</span>
                </a>
            </li>
        </ul>
    </section>
</aside>