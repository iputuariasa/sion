<div class="topbar sticky-top" style="background-color: #f5f5f5">
  <nav>
      <div class="toggle">
          <i class="fa-solid fa-angles-right"></i>
      </div>
      <span class="navbar-brand text-primary fw-semibold fs-5 title-lg">
          <img src="/img/logoSMKTI.png" alt="" class="logo"> SMK TI Bali Global Karangasem</span>
      <span class="navbar-brand text-primary fw-semibold fs-5 title-sm">
          <img src="/img/icon-stikar.png" alt="" class="logo"> Stikar</span>
      <div class="profil rounded-circle dropstart">
          <img src="{{ asset('storage/'.auth()->user()->foto) }}" alt="" class="w-100 dropdown-toggle rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
          <ul class="dropdown-menu">
                <!-- Info User -->
                <div class="ps-2 info-user">
                  <span class="fw-semibold text-uppercase">{{ auth()->user()->nama }}</span><br>
                  <small class="text-decoration-underline">{{ auth()->user()->kode_login }}</small>
                  <div class="d-flex mt-2 justify-content-around">
                    <a href="#" class="text-decoration-none px-3 py-1 bg-primary text-white rounded me-1">
                      <i class="fa-solid fa-address-card"></i> Profil
                    </a>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger rounded px-3 py-1 bg-danger text-white">
                        <i class="fa-solid fa-power-off me-1"></i>Logout
                      </button>
                    </form>
                    {{-- <a href="#" class="text-decoration-none px-3 py-1 bg-danger text-white rounded">
                      <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a> --}}
                  </div>
              </div>
          </ul>
      </div>
  </nav>
</div>