<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2"><img src="{{ asset('assets/image/logo/logo e-catlok.png') }}" alt="" width="170px"></span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    
    <div class="menu-inner-shadow"></div>
    <hr>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase"><span class="menu-header-text">Masters</span></li>
      
      <li class="menu-item {{ Request::is('apply') ? 'active' : '' }}">
        <a href="/apply" class="menu-link">
          <i class="menu-icon tf-icons bx bx-buildings"></i>
          <div data-i18n="Basic">Apply</div>
        </a>
      </li>
      
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengaturan</span></li>
      
      <li class="menu-item {{ Request::is('profile') ? 'active' : '' }}">
        <a href="/profile" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Basic">Akun</div>
        </a>
      </li>
    
    </ul>
  </aside>