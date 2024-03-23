<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        {{--
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form --> --}}
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('users') }}">
                    <i class="fa-solid fa-users"></i>
                    <span> Users</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('logs')}}">
                    <i class="fa-regular fa-note-sticky"></i>
                    <span>Logs</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('clients') }}">
                    <i class="fa-solid fa-address-book"></i>
                    <span>Clients</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('todo')}}">
                    <i class="fa-solid fa-check"></i>
                    <span>TODO</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('calendar')}}">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Calendar</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('projects')}}">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('invoices')}}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>Invoices</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('tickets')}}">
                    <i class="fa-solid fa-ticket"></i>
                    <span>Tickets</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('categories')}}">
                    <i class="fa-solid fa-table-cells"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('products')}}">
                    <i class="fa-brands fa-product-hunt"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('orders')}}">
                    <i class="fa-solid fa-folder-plus"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('promos')}}">
                    <i class="fa-solid fa-rectangle-ad"></i>
                    <span>Promos</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
