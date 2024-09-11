<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><img src="{{ asset('img/logo.png') }}" width="140" alt=""></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="{{ asset('img/logo.png') }}" width="40" alt=""></a>
        </div>
        <ul class="sidebar-menu mt-4">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Main Menu</li>
            <li class="{{ Request::is('*award*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('award') }}"><i class="fas fa-trophy"></i> <span>Award</span></a>
            </li>
            <li class="{{ Request::is('*banners*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('banners') }}"><i class="fas fa-flag"></i> <span>Banners</span></a>
            </li>
            <li class="{{ Request::is('*branch*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('branch') }}"><i class="fas fa-store"></i> <span>Branch</span></a>
            </li>
            <li class="{{ Request::is('*categories*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('categories') }}"><i class="fas fa-syringe"></i> <span>Categories</span></a>
            </li>
            <li class="{{ Request::is('*corporate-governances*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('corporate-governances') }}"><i class="fas fa-book"></i> <span>Corporate Governances</span></a>
            </li>
            <li class="{{ Request::is('*customer*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('customer') }}"><i class="fas fa-hospital"></i> <span>Customer</span></a>
            </li>
            <li class="{{ Request::is('*events*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('events') }}"><i class="fas fa-calendar-days"></i> <span>Events</span></a>
            </li>
            <li class="{{ Request::is('*news*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('news') }}"><i class="fas fa-newspaper"></i> <span>News</span></a>
            </li>
            <li class="{{ Request::is('*principal*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('principal') }}"><i class="fas fa-building"></i> <span>Principal</span></a>
            </li>
            <li class="{{ Request::is('*product*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('product') }}"><i class="fas fa-capsules"></i> <span>Product</span></a>
            </li>
            <li class="{{ Request::is('*staffs*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('staffs') }}"><i class="fas fa-users"></i> <span>Staffs</span></a>
            </li>
        </ul>
    </aside>
</div>
