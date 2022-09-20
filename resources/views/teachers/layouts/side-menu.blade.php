<div class="navbar position-fixed m-0 p-0">
    <ul>
        <li class="arrow">
            <div class="text-white box-menu">
                <i class="fa-solid fa-angles-left"></i>
            </div>
        </li>
        <li>
            <div class="{{ Request::is('/') ? 'active' : '' }} box-menu box-menu">
                <a href="/" class="text-decoration-none text-white">
                    <i class="fa-solid fa-house"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="{{ Request::is('civitas*') ? 'active' : '' }} text-white box-menu">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>
                    <ol class="list-unstyled">
                        <li>
                            <a href="/civitas/search_student" class="text-decoration-none text-white px-3">Siswa</a>
                        </li>
                        <li>
                            <a href="/civitas/search_teacher" class="text-decoration-none text-white px-3">Guru</a>
                        </li>
                    </ol>
                </span>
            </div>
        </li>
        <li>
            <div class="box-menu {{ Request::is('myworks*') ? 'active' : '' }}">
                <i class="fa-solid fa-book-open"></i>
                <span>
                    <ol class="list-unstyled">
                        <li>
                            <a href="/myworks/journals" class="text-decoration-none text-white px-3">Jurnal</a>
                        </li>
                        <li>
                            <a href="/myworks/attendances" class="text-decoration-none text-white px-3">Absensi</a>
                        </li>
                    </ol>
                </span>
            </div>
        </li>
        <li>
            <div class="box-menu {{ Request::is('scores*') ? 'active' : '' }}">
                <a href="/scores" class="text-decoration-none text-white">
                    <i class="fa-solid fa-star"></i>
                    <span>Nilai</span>
                </a>
            </div>
        </li>
        <li>
            <div href="" class="box-menu">
                <a href="" class="text-decoration-none text-white">
                    <i class="fa-solid fa-server"></i>
                    <span>Rekap</span>
                </a>
            </div>
        </li>
        <li>
            <div  class="box-menu {{ Request::is('teacher/announcements') ? 'active' : '' }}">
                <a href="/teacher/announcements" class="text-decoration-none text-white">
                    <i class="fa-solid fa-bell"></i>
                    <span>Pengumuman</span>
                </a>
            </div>
        </li>
        <li>
            <div class="box-menu {{ Request::is('biodata') ? 'active' : '' }}">
                <a href="/biodata" class="text-decoration-none text-white">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Profile</span>
                </a>
            </div>
        </li>
        <li>
            <div class="box-menu">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none text-white">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
</div>