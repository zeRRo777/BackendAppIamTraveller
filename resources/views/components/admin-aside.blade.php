<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-sharp fa-light fa-users" aria-hidden="true"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.cities.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-sharp fa-light fa-city" aria-hidden="true"></i>
                    <p>
                        Города
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.attractions.index')}}" class="nav-link">
                    <div class="row">
                        <i class="nav-icon fas fa-sharp fa-light fa-landmark" aria-hidden="true"></i>
                        <p>
                            Достопримечательности
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
