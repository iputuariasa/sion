@extends('general.layouts.main')

@if (auth()->user()->admin_id != null)
    @section('container')
        <div class="row">
            <div class="row pt-3 m-0">
                <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                    <h4 class="text-primary">Dashboard</h4>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-4 pb-2">
              <div class="card position-relative" style="width: 100%;">
                <img src="/img/imgCard.jpg" class="card-img-top mb-5" alt="...">
                <div class="card-body text-center mb-4">
                  <span class="d-block fs-5 fw-semibold">{{ auth()->user()->admin->nama }}</span>
                  <span class="fs-6 fw-semibold">{{ auth()->user()->admin->email }}</span>
                </div>
                <div class="image-circle position-absolute top-50 start-50 translate-middle img-fluid box-imgProfil">
                  <img src="{{ asset('storage/'.auth()->user()->foto) }}" alt="" class="bg-primary rounded-circle img-fluid w-100">
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card bg-primary text-white border-0">
                <div class="card-body box-detailSekolah">
                    <table class="fs-5 w-100">
                      <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ auth()->user()->admin->nip }}</td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ auth()->user()->admin->jabatan }}</td>
                      </tr>
                      <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td>{{ auth()->user()->admin->telepon }}</td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ auth()->user()->admin->agama }}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ auth()->user()->admin->jk }}</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ auth()->user()->admin->alamat }}</td>
                      </tr>
                    </table>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="row m-0">
                <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2 border-bottom">
                    <h5 class="text-primary">Pengumuman</h5>
                </div>
            </div>
        </div>
        @foreach ($announcements as $announcement)
            <div class="row justify-content-center mb-3">
                <div class="col-lg-11">
                    <div class="card text-center">
                        <div class="card-header bg-info">
                            {{ $announcement->judul }}
                        </div>
                        <div class="card-body">
                        <p class="card-text m-0 p-0" style="font-size: 0.9em">{{ $announcement->ket }}</p>
                        @if ($announcement->dokumen != null)
                          <a href="{{ asset('storage/'.$announcement->dokumen) }}" class="badge text-bg-primary text-decoration-none">Download File</a>
                        @endif
                        </div>
                        <div class="card-footer text-muted p-0 m-0" style="font-size: 0.8em">
                        {{ $announcement->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection

@elseif(auth()->user()->teacher_id != null)
    @section('container')
      <div class="row">
        <div class="row m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2 border-bottom">
                <h4 class="text-primary">Dashboard</h4>
            </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-lg-4 pb-2">
          <div class="card position-relative" style="width: 100%;">
            <img src="/img/imgCard.jpg" class="card-img-top mb-5" alt="...">
            <div class="card-body text-center mb-4">
              <span class="d-block fs-5 fw-semibold">{{ auth()->user()->teacher->nama }}</span>
              <span class="fs-6 fw-semibold">{{ auth()->user()->teacher->email }}</span>
            </div>
            <div class="image-circle position-absolute top-50 start-50 translate-middle img-fluid box-imgProfil">
              <img src="{{ asset('storage/'.auth()->user()->foto) }}" alt="" class="bg-primary rounded-circle img-fluid w-100">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card bg-primary text-white border-0">
            <div class="card-body box-detailSekolah">
                <table class="fs-5 w-100">
                  <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ auth()->user()->teacher->nip }}</td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ auth()->user()->teacher->jabatan }}</td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td>{{ auth()->user()->teacher->telepon }}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ auth()->user()->teacher->agama }}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ auth()->user()->teacher->jk }}</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ auth()->user()->teacher->alamat }}</td>
                  </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="row m-0">
                <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2 border-bottom">
                    <h5 class="text-primary">Pengumuman</h5>
                </div>
            </div>
        </div>
        @foreach ($announcements as $announcement)
            <div class="row justify-content-center mb-3">
                <div class="col-lg-11">
                    <div class="card text-center">
                        <div class="card-header bg-info">
                            {{ $announcement->judul }}
                        </div>
                        <div class="card-body">
                        <p class="card-text m-0 p-0" style="font-size: 0.9em">{{ $announcement->ket }}</p>
                        @if ($announcement->dokumen != null)
                          <a href="{{ asset('storage/'.$announcement->dokumen) }}" class="badge text-bg-primary text-decoration-none">Download File</a>
                        @endif
                        </div>
                        <div class="card-footer text-muted p-0 m-0" style="font-size: 0.8em">
                        {{ $announcement->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
      @endsection

@else
    @section('container')
        <h1>Halaman Student</h1>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none">Keluar</button>
        </form>
    @endsection
@endif