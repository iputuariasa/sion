@extends('admins.layouts.main')

@section('container')
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center justify-content-between">
            <h4 class="text-primary m-0 pe-5">{{ $title }}</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="/announcements"><a href="/announcements" class="text-decoration-none text-secondary"> Data Pengumuman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/announcements/{{ $announcement->id }}/edit" class="text-decoration-none text-secondary"> Ubah Pengumuman</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-9 bg-white p-4">
            <form action="/announcements/{{ $announcement->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Pengumuman</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required value="{{ old('judul', $announcement->judul) }}">
                    @error('judul')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ket" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="ket" rows="3" name="ket">{{ old('ket', $announcement->ket) }}</textarea>
                </div>
                <input type="hidden" name="old_dokumen" value="{{ $announcement->dokumen }}">
                <div class="mb-3">
                    <label for="formFile" class="form-label">File Pengumuman</label>
                    <input class="form-control" type="file" id="formFile" name="dokumen">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary px-5">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection