<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="/admin" class="brand-link">
    <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview"
        role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard.index') }}"
            class="nav-link {{ !request()->is('admin/dashboard') ?: 'active' }}">
            <i class="nav-icon fas fa-th"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.blog.index') }}" class="nav-link {{ !request()->is('admin/blog') ?: 'active' }}">
            <i class="nav-icon fas fa-th"></i>
            <span>Blog</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.products.index') }}"
            class="nav-link {{ !request()->is('admin/products') ?: 'active' }}">
            <i class="nav-icon fas fa-th"></i>
            <span>Products</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
