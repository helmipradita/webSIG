<style>
    .feather-24{
        width: 24px;
        height: 24px;
    }
</style>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <h1 class="sidebar-heading d-flex align-items-center px-3 mt-4 mb-3 flex-column text-muted text-bold">
            <span data-feather="user" class="feather-24"></span> {{ auth()->user()->name }}
        </h1>
        <ul class="nav flex-column">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 text-muted">
                <span>Menu</span>
            </h6>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>

            @can('product')
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}">
                    <span data-feather="file-text"></span>
                    Produk
                </a>
            </li>
            @endcan

            @can('allproduct')
            <li class="nav-item">
                <a href="{{ route('allproducts.index') }}" class="nav-link {{ Request::is('dashboard/allproducts') ? 'active' : '' }}">
                    <span data-feather="database"></span>
                    All Produk
                </a>
            </li>
            @endcan

            @can('kategori')
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}">
                    <span data-feather="list"></span>
                    Kategori
                </a>
            </li>
            @endcan

            @can('kecamatan')
            <li class="nav-item">
                <a href="{{ route('kecamatan.index') }}" class="nav-link {{ Request::is('dashboard/kecamatan*') ? 'active' : '' }}">
                    <span data-feather="map"></span>
                    Kecamatan
                </a>
            </li>
            @endcan

            @can('tempat')
            <li class="nav-item">
                <a href="{{ route('tempat.index') }}" class="nav-link {{ Request::is('dashboard/tempat*') ? 'active' : '' }}">
                    <span data-feather="map-pin"></span>
                    Tempat
                </a>
            </li>
            @endcan

            @can('alluser')
            <li class="nav-item">
                <a href="{{ route('alluser.index') }}" class="nav-link {{ Request::is('dashboard/alluser') ? 'active' : '' }}">
                    <span data-feather="users"></span>
                    All User
                </a>
            </li>
            @endcan

            @can('permission')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Role & Permission</span>
            </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/role-and-permission/roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                            <span data-feather="tool"></span>
                            Roles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/role-and-permission/permissions*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                            <span data-feather="tool"></span>
                            Permissions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/role-and-permission/assignable*') ? 'active' : '' }}" href="{{ route('assign.create') }}">
                            <span data-feather="tool"></span>
                            Assign Permission
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/role-and-permission/assign/user*') ? 'active' : '' }}" href="{{ route('assign.user.create') }}">
                            <span data-feather="tool"></span>
                            Permission to Users
                        </a>
                    </li>
                </ul>
            @endcan
        </ul>
    </div>
</nav>