<div class="nav myNav position-fixed">
    <ul class="ps-0">
        <li>
            <a href="" class="box-menu">
                <span class="iconBrand"><img src="/img/icon-stikar.png" alt=""></i></span>
                <span class="title brand">STIKAR</span>
            </a>
        </li>
        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="/" class="box-menu">
                <span class="icon"><i class="fa-solid fa-lines-leaning"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="{{ Request::is('data_umum*') ? 'active' : '' }}">
            <a href="/data_umum" class="box-menu">
                <span class="icon"><i class="fa-solid fa-server"></i></span>
                <span class="title">Data Umum</span>
            </a>
        </li>
        <li class="{{ Request::is('schedules*') ? 'active' : '' }}">
            <a href="/schedules" class="box-menu">
                <span class="icon"><i class="fa-solid fa-clipboard-list"></i></span>
                <span class="title">Data Jadwal</span>
            </a>
        </li>
        <li class="{{ Request::is('teachers*') ? 'active' : '' }}">
            <a href="/teachers" class="box-menu">
                <span class="icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                <span class="title">Data Guru</span>
            </a>
        </li>
        <li class="{{ Request::is('students*') ? 'active' : '' }}">
            <a href="/students" class="box-menu">
                <span class="icon"><i class="fa-solid fa-user-graduate"></i></span>
                <span class="title">Data Siswa</span>
            </a>
        </li>
        <li class="{{ Request::is('academics*') ? 'active' : '' }}">
            <a href="/academics" class="box-menu">
                <span class="icon"><i class="fa-solid fa-school"></i></span>
                <span class="title">Akademik</span>
            </a>
        <li>
        <li class="{{ Request::is('announcements*') ? 'active' : '' }}">
            <a href="/announcements" class="box-menu">
                <span class="icon"><i class="fa-solid fa-bell"></i></span>
                <span class="title">Pengumuman</span>
            </a>
        <li>
            <form action="/logout" method="post" class="box-menu">
                @csrf
                <button type="submit" class="box-menu btn btn-link border-0 m-0 p-0">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="title">Keluar</span>
                </button>
            </form>
        </li>
    </ul>
</div>