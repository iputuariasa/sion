@extends('admins.layouts.main')

@section('container')
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center justify-content-between">
            <h4 class="text-primary m-0 pe-5">{{ $title }}</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/announcements"><a href="/announcements" class="text-decoration-none text-secondary"> Data Pengumuman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/announcements/{{ $announcement->id }}" class="text-decoration-none text-secondary"> Detail Pengumuman</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card text-center">
                <div class="card-header bg-info">
                  Pengumuman
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $announcement->judul }}</h5>
                  <p class="card-text">{{ $announcement->ket }}</p>
                  <a href="{{ asset('storage/'.$announcement->dokumen) }}" class="btn btn-primary">Download File</a>
                </div>
                <div class="card-footer text-muted">
                  {{ $announcement->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex flex-row text-end mt-3">
        <div>
          <a href="/announcements" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
          
          <a href="/announcements/{{ $announcement->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i> Ubah Data</a>
          
          <form action="/announcements/{{ $announcement->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa-solid fa-trash-can align-text-bottom"></i> Hapus Data</button>
          </form>

        </div>
    </div>
@endsection