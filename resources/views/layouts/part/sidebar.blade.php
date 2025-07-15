<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Lajur.id</span>
    </a>

    <ul class="side-menu top">
        @if(Auth::user()->isAdmin != 1)
            {{-- Menu PETUGAS --}}
            <li class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}">
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
            <li class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
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
        @else
            {{-- Menu ADMIN --}}
            <li class="{{ request()->routeIs('backend.index') ? 'active' : '' }}">
                <a href="{{ route('backend.index') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('petugas.*') ? 'active' : '' }}">
                <a href="{{ route('petugas.index') }}">
                    <i class='bx bx-wallet'></i>
                    <span class="text">Data Petugas</span>
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
            <li class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                <a href="{{ route('pembayaran.index') }}">
                    <i class='bx bx-credit-card'></i>
                    <span class="text">Pembayaran</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('kompensasi.*') ? 'active' : '' }}">
                <a href="{{ route('kompensasi.index') }}">
                    <i class='bx bx-credit-card'></i>
                    <span class="text">Kompensasi</span>
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
        @endif

        <li>
            <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</section>
