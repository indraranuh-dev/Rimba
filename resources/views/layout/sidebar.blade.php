<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Rimba<span>House</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{request()->routeIs('adm.index') ? 'active' : '' }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Konten</li>
            <li class="nav-item {{request()->routeIs('adm.item.*') ? 'active' : '' }}">
                <a href="{{route('adm.item.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="codepen"></i>
                    <span class="link-title">Barang</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('adm.customer.*') ? 'active' : '' }}">
                <a href="{{route('adm.customer.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Pelanggan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('adm.sales.*') ? 'active' : '' }}">
                <a href="{{route('adm.sales.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Penjualan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
