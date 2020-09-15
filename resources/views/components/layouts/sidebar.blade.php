<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @can('show dashboard')
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            @endcan

            @can('role & permission')
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                    Role & Permission
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Roles</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Permission</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('assign.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assign Permission</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('assign.user.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Permission to Users</p>
                        </a>
                        </li>
                </ul>
                </li>
            @endcan

            @can('show default menu')
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                    Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @endcan
        </nav>
</div>