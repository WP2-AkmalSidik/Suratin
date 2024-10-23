<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-5">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/icons/brands/R.png') }}" alt="Logo"
                style="width: 110px; height: 75px; margin-top: 1;">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Basic">Dashboards</div>
            </a>
        </li>

        <!-- Management Section -->
        <li class="menu-header mt-2">
            <span class="menu-header-text">Management</span>
        </li>

        <!-- Surat Menu -->
        <li
            class="menu-item {{ request()->routeIs('surat-masuk.index') || request()->routeIs('surat-masuk.show') || request()->routeIs('surat-keluar.index') ? 'open' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-mail-open-line"></i>
                <div data-i18n="Extended UI">Surat</div>
            </a>
            <ul class="menu-sub">
                <!-- Surat Keluar Memo -->
                <li class="menu-item {{ request()->is('surat-keluar*') ? 'active' : '' }}">
                    <a href="{{ route('surat-masuk.index') }}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Surat Keluar Memo</div>
                    </a>
                </li>

                <!-- Surat Keluar -->
                <li class="menu-item {{ request()->routeIs('surat-keluar.index') ? 'active' : '' }}">
                    <a href="{{ route('surat-keluar.index') }}" class="menu-link">
                        <div data-i18n="Text Divider">Surat Keluar</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Documentation -->
        <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ri-article-line"></i>
                <div data-i18n="Documentation">Cara Penggunaan</div>
            </a>
        </li>
    </ul>
</aside>
