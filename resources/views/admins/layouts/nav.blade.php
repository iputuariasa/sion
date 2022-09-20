{{-- @dd(auth()->user()->admin->foto) --}}
<div class="user-box shadow-sm rounded d-flex p-3" style="background-color: #fff">
    <div class="col-4 d-flex">
      <img src="{{ asset('storage/'.auth()->user()->foto) }}" alt="" class="bg-primary rounded-circle m-1">
    </div>
    <!-- Info User -->
    <div class="col-8 ps-2 info-user">
      <span class="m-0 d-block">{{ auth()->user()->nama }}</span>
      <small class="">{{ auth()->user()->kode_login }}</small>
      <div class="button-user d-flex mt-1 mb-1">
        <a href="/biodata" class="text-decoration-none px-3 py-1 bg-primary text-white rounded-pill me-1">
          Profil
        </a>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="btn btn-danger rounded-pill" style="font-size: 0.8em">
            <i class="fa-solid fa-power-off pe-1"></i>Logout
          </button>
        </form>
      </div>
    </div>
  </div>
  
  <div class="topbar sticky-top" style="background-color: #f4f4f4">
    <!-- toggle -->
    <div class="toggle">
        <i class="fas fa-bars"></i>
    </div>
    <!-- search -->
    <div class="myNav-title">
        <h5 class="m-0 fw-bold">SMK TI Bali Global Karangasem</h5>
    </div>
    <!-- user -->
    <div class="toggle-user text-end">
        <img src="{{ asset('storage/'.auth()->user()->foto) }}" class="rounded-circle" alt="" style="background-color: blue">
    </div>
  </div>