@extends('admins.layouts.main')

@section('container')
{{-- @dd($student->user()); --}}
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center justify-content-between">
            <h4 class="text-primary m-0 pe-5">Data Biodata</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/students"><a href="/students" class="text-decoration-none text-secondary"> Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/students/{{ $student->slug }}/edit" class="text-decoration-none text-secondary"> Ubah Data Guru</a></li>
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
              <span class="d-block fs-5 fw-semibold">{{ $student->nama }}</span>
              <span class="fs-6 fw-semibold">{{ $student->email }}</span>
            </div>
            <div class="image-circle position-absolute top-50 start-50 translate-middle img-fluid box-imgProfil">
              <img src="{{ asset('storage/'.$student->user->foto) }}" alt="" class="bg-primary rounded-circle img-fluid w-100">
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
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{ $student->nis }}</td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $student->class->nama_kelas }}</td>
                          </tr>
                          <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td>{{ $student->telepon }}</td>
                          </tr>
                          <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $student->agama }}</td>
                          </tr>
                          <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $student->jk }}</td>
                          </tr>
                          <tr>
                            <td>Tahun Angkatan</td>
                            <td>:</td>
                            <td>{{ $student->tahun_angkatan }}</td>
                          </tr>
                          <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td>{{ $student->nama_ayah }}</td>
                          </tr>
                          <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td>{{ $student->nama_ibu }}</td>
                          </tr>
                          <tr>
                            <td>Tempat/Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $student->tempat_lahir }} / {{ $student->tgl_lahir }}</td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $student->alamat }}</td>
                          </tr>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-ubahBiodata" role="tabpanel" aria-labelledby="nav-ubahBiodata-tab" tabindex="0">
                    <form class="row g-3" action="/students/{{ $student->slug }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        {{-- <input type="hidden" name="idUser" value="{{  }}"> --}}
                        <input type="hidden" name="oldFoto" value="{{ $student->user->foto }}">
                        <div class="mt-5 text-center d-flex justify-content-center">
                            <div class="image-circle img-fluid box-imgProfil d-flex justify-content-center">
                            @if ($student->user->foto)
                                <img src="{{ asset('storage/'.$student->user->foto) }}" alt="" class="bg-primary rounded-circle img-fluid w-100 img-preview">
                            @else
                                <img class="bg-primary rounded-circle img-fluid w-100 img-preview">
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="foto" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewImage()">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis', $student->nis) }}">
                                @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="mclass_id">
                                    <option selected value="{{ $student->class->id }}">{{ $student->class->nama_kelas }}</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $student->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $student->telepon) }}">
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    @if (old('jk', $student->jk ) == 'Laki-laki')
                                        <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" checked>
                                    @else
                                        <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki">
                                    @endif
                                    <label class="form-check-label" for="laki-laki">
                                    Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if (old('jk', $student->jk) == 'Perempuan')
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
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" aria-label="Default select example" name="agama">
                                    <option selected>{{ $student->agama }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="tahun_angkatan" class="form-label">Tahun Angkatan</label>
                                <input type="text" class="form-control @error('tahun_angkatan') is-invalid @enderror" id="tahun_angkatan" name="tahun_angkatan" value="{{ old('tahun_angkatan', $student->tahun_angkatan) }}">
                                @error('tahun_angkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $student->nama_ayah) }}">
                                @error('nama_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $student->nama_ibu) }}">
                                @error('nama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $student->tempat_lahir) }}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $student->tgl_lahir) }}">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="row mb-3">
                            <div class="col">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ $student->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center px-5 my-3">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-ubahPassword" role="tabpanel" aria-labelledby="nav-ubahPassword-tab" tabindex="0">
                    <form action="/students/{{ $student->slug }}" method="POST" enctype="multipart/form-data" class="p-2 mt-2">
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