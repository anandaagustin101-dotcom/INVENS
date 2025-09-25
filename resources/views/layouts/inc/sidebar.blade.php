<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <img src="{{ asset('img/icons/misc/logo-inves.png') }}" alt="Logo" class="logo" />
            <span class="app-brand-text demo menu-text fw-bold">Inventify</span>
        </a>

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
