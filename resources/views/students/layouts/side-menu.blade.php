<div class="navbar position-fixed m-0 p-0">
    <ul>
        <li class="arrow">
            <div class="text-white box-menu">
                <i class="fa-solid fa-angles-left"></i>
            </div>
        </li>
        <li>
            <div class="active box-menu box-menu">
                <i class="fa-solid fa-house"></i>
            </div>
        </li>
        <li>
            <div class="text-white box-menu">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>
                    <ol class="list-unstyled">
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Siswa</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Guru</a>
                        </li>
                    </ol>
                </span>
            </div>
        </li>
        <li>
            <div class="text-white box-menu">
                <i class="fa-solid fa-user"></i>
                <span>
                    <ol class="list-unstyled">
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Biodata</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Jadwal</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Absensi</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Nilai</a>
                        </li>
                    </ol>
                </span>
            </div>
        </li>
        <li>
            <div class="text-white box-menu">
                <i class="fa-solid fa-box-archive"></i>
                <span>
                    <ol class="list-unstyled">
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Kalender Akademik</a>
                        </li>
                        <li>
                            <a href="" class="text-decoration-none text-white px-3">Kerja Praktek</a>
                        </li>
                    </ol>
                </span>
            </div>
        </li>
        <li>
            <div class="box-menu">
                <a href="" class="text-decoration-none text-white">
                    <i class="fa-solid fa-bell"></i>
                    <span>Pengumuman</span>
                </a>
            </div>
        </li>
        <li>
            <div class="box-menu">
                <a href="" class="text-decoration-none text-white">
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