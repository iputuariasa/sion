@extends('admins.layouts.main')

@section('container')
    <div class="row pt-3">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
            <h4 class="text-primary">Data Pengumuman</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPengumuman"><i class="fa-solid fa-circle-plus"></i> Tambah Pengumuman
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row mb-2 d-flex justify-content-center">
        <div class="col-md-8">
            <form class="d-flex" role="search" action="/announcements" method="">
                <input class="form-control me-2" type="search" placeholder="Cari Data Pengumuman" aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    @if ($announcements->count())
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Judul</td>
                    <td>Keterangan</td>
                    <td>Dokumen</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $announcement->judul }}</td>
                        <td>{{ Str::limit(strip_tags($announcement->ket), 70) }}</td>
                        <td>
                            @if ($announcement->dokumen != null)
                                <a href="{{ asset('storage/'.$announcement->dokumen) }}" class="badge bg-success text-decoration-none text-white">Download</a>
                            @endif
                        </td>
                        <td>
                            <a href="/announcements/{{ $announcement->id }}" class="badge bg-info"><i class="fa-solid fa-eye align-text-bottom"></i></a>

                            <a href="/announcements/{{ $announcement->id }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i></a>
                            
                            <form action="/announcements/{{ $announcement->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa-solid fa-trash-can align-text-bottom"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $announcements->links() }}
        </div>
    @else
        <h3 class="text-center mt-5">Pengumuman Tidak Ada!</h3>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="tambahPengumuman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPengumumanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="tambahPengumumanLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/announcements" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="inputJudul" placeholder="Judul Pengumuman" name="judul" value="{{ old('judul') }}" required>
                                <label for="inputJudul" class="ps-4">Judul Pengumuman</label>
                                @error('judul')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control @error('ket') is-invalid @enderror" placeholder="Keterangan Pengumuman" id="ket" style="height: 150px" name="ket">{{ old('ket') }}</textarea>
                                    <label for="ket">Keterangan Pengumuman</label>
                                    @error('ket')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="filePengumuman" class="form-label">File Pengumuman</label>
                                <input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="filePengumuman" name="dokumen">
                                <div class="valid">
                                    <small class="text-muted">Format file dokumen : .pdf, .doc, .docx, .xls, .xlxs</small>
                                </div>
                                @error('dokumen')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection