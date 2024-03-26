<ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            {{-- <img class="ulogo" src="{{ asset('img/evoku_u.png') }}" alt="Udinus" width="30%" >
            <style>
                .ulogo:hover{width:32%;}
                .ulogo{transition: 0.1s;}
            </style> --}}
            {{-- <div class="sidebar-brand-text mx-3">E-Voku</div> --}}
        </div>
        {{-- <div class="sidebar-brand-text mx-3">E-Voku <sup>Dinus</sup></div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @auth
        @if (auth()->user()->role_id === 1)
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/superadmin">
                    <i class="fas fa-user text-dark"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/role">
                    <i class="fas fa-users text-dark"></i>
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
                    <i class="fas fa-users text-dark"></i>
                    <span>Jenis Barang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/pemasok">
                    <i class="fas fa-users text-dark"></i>
                    <span>Pemasok</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/toko">
                    <i class="fas fa-users text-dark"></i>
                    <span>Toko</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/gudang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/barang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Barang</span>
                </a>
            </li>

            <div class="sidebar-heading">
                Management Barang
            </div>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-gudang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Barang -> Gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-gudang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Total Barang yang ada di gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-toko">
                    <i class="fas fa-users text-dark"></i>
                    <span>Barang Gudang -> Toko</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-toko">
                    <i class="fas fa-users text-dark"></i>
                    <span>Total Barang yang ada di toko</span>
                </a>
            </li>

            <div class="sidebar-heading">
                transaction
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/customer">
                    <i class="fas fa-users text-dark"></i>
                    <span>Customer</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/transaksi">
                    <i class="fas fa-users text-dark"></i>
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
                    <i class="fas fa-users text-dark"></i>
                    <span>Barang</span>
                </a>
            </li>

            <div class="sidebar-heading">
                Management Barang
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-gudang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Barang -> Gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-gudang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Total Barang yang ada di gudang</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/detail-stok-toko">
                    <i class="fas fa-users text-dark"></i>
                    <span>Barang Gudang -> Toko</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/total-stok-toko">
                    <i class="fas fa-users text-dark"></i>
                    <span>Total Barang yang ada di toko</span>
                </a>
            </li>

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
                    <i class="fas fa-users text-dark"></i>
                    <span>Customer</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-dark" href="/ketersediaan-barang">
                    <i class="fas fa-users text-dark"></i>
                    <span>Ketersediaan Barang</span>
                </a>
            </li>

            <div class="sidebar-heading">
                transaction
            </div>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/transaksi/create">
                    <i class="fas fa-users text-dark"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link text-dark" href="/transaksi">
                    <i class="fas fa-users text-dark"></i>
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
