<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <img src="{{ asset('img/icons/misc/logo-inves.jpg.png') }}" alt="Logo" class="logo"
            style="width: 80px; height: auto;" />
            <span class="app-brand-text demo menu-text fw-bold" style="margin-left:2px;">Inventify</span>
        </a>

        <style>
    .app-brand-link {
        display: flex !important;
        align-items: center !important;
        gap: 1px !important; 
        padding-left: 0 !important;
    }

    .app-brand-link .logo {
        width: 70px !important; 
        height: auto !important;
    }

    .app-brand-logo.demo {
        width: auto !important;
        height: auto !important;
    }
</style>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home-heart"></i>
                Dashboard
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('databarang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-list-details"></i>
                Data Barang
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('barang-masuk.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-package-import"></i>
                Barang Masuk
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('barang-keluar.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-package-export"></i>
                Barang Keluar
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('laporan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-clipboard-text"></i>
                Laporan
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user-heart"></i>
                Admin
            </a>
        </li>
    </ul>
</aside>
