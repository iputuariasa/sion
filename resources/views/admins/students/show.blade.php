@extends('admins.layouts.main')

@section('container')
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center justify-content-between">
            <h4 class="text-primary m-0 pe-5">Data {{ $student->nama }}</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/students"><a href="/students" class="text-decoration-none text-secondary"> Data Guru</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/students/{{ $student->slug }}" class="text-decoration-none text-secondary"> Detail Guru</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-lg-4 pb-2">
          <div class="card position-relative" style="width: 100%;">
            <img src="/img/imgCard.jpg" class="card-img-top mb-5" alt="...">
            <div class="card-body text-center mb-4">
              <span class="d-block fs-5 fw-semibold">{{ $student->nama }}</span>
              <span class="fs-6 fw-semibold">{{ $student->email }}</span>
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
          </div>
        </div>
      </div>
      <div class="row d-flex flex-row text-end">
        <div>
          <a href="/students" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
          
          <a href="/students/{{ $student->slug }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i> Ubah Data</a>
          
          <form action="/students/{{ $student->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa-solid fa-trash-can align-text-bottom"></i> Hapus Data</button>
          </form>

        </div>
      </div>
@endsection