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
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>

            </li>
            <li class="treeview">
                <a href="{{ route('users.index') }}">
                    <i class="fa-solid fa-users"></i>
                    <span> Users</span>

                </a>

            <li>
                <a href="pages/widgets.html">
                    <i class="fa-regular fa-note-sticky"></i><span>Logs</span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-bell"></i> <span> Notifications</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('clients.index') }}">
                    <i class="fa-solid fa-address-book"></i> <span> Clients</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-check"></i> <span> To Do</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-calendar-days"></i><span> Calendar</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
