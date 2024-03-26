<nav class="navbar navbar-expand navbar-dark bg-success topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->


    <a class="navbar-brand" href="#"><img src="../assets/icons.png" alt="" width="250"></a>
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-4 d-none d-lg-inline text-white ">Selamat Datang, {{ $user }}</span>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-4 d-none d-lg-inline text-white logout-button">Keluar <i
                        class="bi bi-box-arrow-right"></i></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item btn-danger " href="#" data-toggle="modal" data-target="#logoutModal">
                    Keluar <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
        </li>
    </ul>
</nav>
