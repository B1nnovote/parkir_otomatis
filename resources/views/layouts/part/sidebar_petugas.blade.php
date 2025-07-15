<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('frontend.*') ? 'active' : '' }}">
            <a href="{{ route('frontend.index') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('datakendaraan.*') ? 'active' : '' }}">
            <a href="{{ route('datakendaraan.index') }}">
                <i class='bx bxs-car'></i>
                <span class="text">Data Kendaraan</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('kendaraanmasuk.*') ? 'active' : '' }}">
            <a href="{{ route('kendaraanmasuk.index') }}">
                <i class='bx bx-log-in'></i>
                <span class="text">Kendaraan Masuk</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('kendaraankeluar.*') ? 'active' : '' }}">
            <a href="{{ route('kendaraankeluar.index') }}">
                <i class='bx bx-log-out'></i>
                <span class="text">Kendaraan Keluar</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('pembayarankeluar.*') ? 'active' : '' }}">
            <a href="{{ route('pembayaran.index') }}">
                <i class='bx bx-credit-card'></i>
                <span class="text">Pembayaran</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('stok.*') ? 'active' : '' }}">
            <a href="{{ route('stok.index') }}">
                <i class='bx bxs-box'></i>
                <span class="text">Stok Lahan</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('keuangan.*') ? 'active' : '' }}">
            <a href="{{ route('keuangan.index') }}">
                <i class='bx bx-wallet'></i>
                <span class="text">Keuangan</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Team</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</section>
