<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="index.php?page=dashboard-admin"
                class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'dashboard-admin') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-life-ring"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li
            class="nav-item has-treeview <?php echo (isset($_GET['page']) && ($_GET['page'] == 'postadmin' || $_GET['page'] == 'kategori' || $_GET['page'] == 'user')) ? 'menu-open' : ''; ?>">
            <a href="#"
                class="nav-link <?php echo (isset($_GET['page']) && ($_GET['page'] == 'postadmin' || $_GET['page'] == 'kategori' || $_GET['page'] == 'user')) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                    List tugas
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="index.php?page=postadmin"
                        class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'postadmin') ? 'active' : ''; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>POST</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=kategori"
                        class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'kategori') ? 'active' : ''; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>KATEGORI</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=user"
                        class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'user') ? 'active' : ''; ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>USER</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-red" onclick="logout()">
                <i class="nav-icon fas  fa-arrow-circle-left"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>