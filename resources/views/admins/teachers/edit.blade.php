@extends('admins.layouts.main')

@section('container')
{{-- @dd($teacher->user()); --}}
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center justify-content-between">
            <h4 class="text-primary m-0 pe-5">Data Biodata</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/teachers"><a href="/teachers" class="text-decoration-none text-secondary"> Data Guru</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/teachers/{{ $teacher->slug }}/edit" class="text-decoration-none text-secondary"> Ubah Data Guru</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('errorPassword'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errorPassword') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row mb-5 me-2">
        <div class="col-lg-4 pb-2">
          <div class="card position-relative" style="width: 100%;">
            <img src="/img/imgCard.jpg" class="card-img-top mb-5" alt="...">
            <div class="card-body text-center mb-4">
              <span class="d-block fs-5 fw-semibold">{{ $teacher->nama }}</span>
              <span class="fs-6 fw-semibold">{{ $teacher->email }}</span>
            </div>
            <div class="image-circle position-absolute top-50 start-50 translate-middle img-fluid box-imgProfil">
              <img src="{{ asset('storage/'.$teacher->user->foto) }}" alt="" class="bg-primary rounded-circle img-fluid w-100">
            </div>
          </div>
        </div>
        <div class="col-lg-8 bg-white p-3">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-biodata-tab" data-bs-toggle="tab" data-bs-target="#nav-biodata" type="button" role="tab" aria-controls="nav-biodata" aria-selected="true">Biodata</button>
                    <button class="nav-link" id="nav-ubahBiodata-tab" data-bs-toggle="tab" data-bs-target="#nav-ubahBiodata" type="button" role="tab" aria-controls="nav-ubahBiodata" aria-selected="false">Ubah Biodata</button>
                    <button class="nav-link" id="nav-ubahPassword-tab" data-bs-toggle="tab" data-bs-target="#nav-ubahPassword" type="button" role="tab" aria-controls="nav-ubahPassword" aria-selected="false">Ubah Password</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-biodata" role="tabpanel" aria-labelledby="nav-biodata-tab" tabindex="0">
                    <table class="fs-6 w-100 ms-2 mt-2">
                        <tr>
                          <td class="pb-2">NIP</td>
                          <td>:</td>
                          <td>{{ $teacher->nip }}</td>
                        </tr>
                        <tr>
                          <td class="pb-2">Jabatan</td>
                          <td>:</td>
                          <td>{{ $teacher->jabatan }}</td>
                        </tr>
                        <tr>
                          <td class="pb-2">Telepon</td>
                          <td>:</td>
                          <td>{{ $teacher->telepon }}</td>
                        </tr>
                        <tr>
                          <td class="pb-2">Agama</td>
                          <td>:</td>
                          <td>{{ $teacher->agama }}</td>
                        </tr>
                        <tr>
                          <td class="pb-2">Jenis Kelamin</td>
                          <td>:</td>
                          <td>{{ $teacher->jk }}</td>
                        </tr>
                        <tr>
                          <td class="pb-2">Alamat</td>
                          <td>:</td>
                          <td>{{ $teacher->alamat }}</td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-ubahBiodata" role="tabpanel" aria-labelledby="nav-ubahBiodata-tab" tabindex="0">
                    <form class="row g-3" action="/teachers/{{ $teacher->slug }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        {{-- <input type="hidden" name="idUser" value="{{  }}"> --}}
                        <input type="hidden" name="oldFoto" value="{{ $teacher->user->foto }}">
                        <div class="mt-5 text-center d-flex justify-content-center">
                            <div class="image-circle img-fluid box-imgProfil d-flex justify-content-center">
                            @if ($teacher->user->foto)
                                <img src="{{ asset('storage/'.$teacher->user->foto) }}" alt="" class="bg-primary rounded-circle img-fluid w-100 img-preview">
                            @else
                                <img class="bg-primary rounded-circle img-fluid w-100 img-preview">
                            @endif
                            </div>
                        </div>
                        <div class="">
                            <label for="foto" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewImage()">
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $teacher->nip) }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $teacher->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $teacher->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $teacher->telepon) }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" aria-label="Default select example" name="agama">
                                <option selected>{{ $teacher->agama }}</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                @if (old('jk', $teacher->jk ) == 'Laki-laki')
                                    <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki">
                                @endif
                                <label class="form-check-label" for="laki-laki">
                                Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                @if (old('jk', $teacher->jk) == 'Perempuan')
                                    <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan">
                                @endif
                                <label class="form-check-label" for="perempuan">
                                Perempuan
                                </label>
                            </div>
                            @error('jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $teacher->jabatan) }}">
                            @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $teacher->alamat }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center px-5 my-3">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-ubahPassword" role="tabpanel" aria-labelledby="nav-ubahPassword-tab" tabindex="0">
                    <form action="/teachers/{{ $teacher->slug }}" method="POST" enctype="multipart/form-data" class="p-2 mt-2">
                        @method('put')
                        @csrf
                        <input type="hidden" name="idUser" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="Newpassword" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('newpassword') is-invalid @enderror" id="Newpassword" name="newpassword">
                            @error('newpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Confimpassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('corfimpassword') is-invalid @enderror" id="Confimpassword" name="corfimpassword">
                            @error('corfimpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                          @if (session()->has('errorPassword'))
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ session('errorPassword') }}
                            </div>
                          @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center px-5 my-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
@endsection