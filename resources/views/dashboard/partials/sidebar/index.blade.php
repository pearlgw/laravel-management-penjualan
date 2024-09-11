<ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">

            <style>
                .ulogo:hover {
                    width: 32%;
                }

                .ulogo {
                    transition: 0.1s;
                }
            </style>
            <div class="sidebar-brand-text mx-3">Dashboard</div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @auth
        @if (auth()->user()->role_id === 1)
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item active ">
                <a class="nav-link text-dark " href="/superadmin">

                    <i class="bi bi-house-fill text-dark"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/role">
                    <i class="bi bi-person-fill-gear text-dark"></i>
                    <span>Role</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/user">
                    <i class="fas fa-users text-dark"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/jenis_barang">
                    <i class="bi bi-boxes text-dark"></i>
                    <span>Jenis Barang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/pemasok">
                    <i class="bi bi-person-workspace text-dark"></i>
                    <span>Pemasok</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/toko">
                    <i class="bi bi-shop-window text-dark"></i>
                    <span>Toko</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/gudang">
                    <i class="bi bi-houses-fill text-dark"></i>
                    <span>Gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/barang">
                    <i class="bi bi-box-seam text-dark"></i>
                    <span>Barang</span>
                </a>
            </li>

            <div class="sidebar-heading">
                Management Barang
            </div>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-gudang">

                    <span>Barang -> Gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-gudang">

                    <span>Total Barang yang ada di gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-toko">
                    <span>Barang Gudang -> Toko</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-toko">

                    <span>Total Barang yang ada di toko</span>
                </a>
            </li>

            <div class="sidebar-heading">
                transaction
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/histori-transaksi">
                    <i class="bi bi-cash-stack"></i>
                    <span>Histori Transaksi</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        @elseif (auth()->user()->role_id === 2)
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/barang">

                    <span>Barang</span>
                </a>
            </li>

            <div class="sidebar-heading">
                Management Barang
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-gudang">

                    <span>Barang -> Gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-gudang">

                    <span>Total Barang yang ada di gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-toko">

                    <span>Barang Gudang -> Toko</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-toko">

                    <span>Total Barang yang ada di toko</span>
                </a>
            </li>

<<<<<<< HEAD
=======


>>>>>>> 8818270e6d6a658140d6c14db9f7b1b9dacfdd37
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        @elseif (auth()->user()->role_id === 3)
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="/customer">

                    <span>Customer</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="/ketersediaan-barang">

                    <span>Ketersediaan Barang</span>
                </a>
            </li>

            <div class="sidebar-heading">
                transaction
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/transaksi/create">

                    <span>Transaksi</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/transaksi">

                    <span>Histori Transaksi</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        @endif
    @endauth
</ul>

<script>
    // Ambil URL halaman saat ini
    const currentURL = window.location.href;

    // Ambil semua link di sidebar
    const sidebarLinks = document.querySelectorAll('.nav-link');

    // Periksa setiap link di sidebar
    sidebarLinks.forEach(link => {
        // Jika URL dari link sama dengan URL halaman saat ini
        if (link.href === currentURL) {
            // Tambahkan kelas 'active-link' ke link
            link.classList.add('active-link');
        }
    });
</script>
