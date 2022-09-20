@extends('admins.layouts.main')

@section('container')
    <div class="row pt-3">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
            <h4 class="text-primary">Data Guru</h4>
            <a href="/teachers/create" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Tambah Guru</a>
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
            <form class="d-flex" role="search" action="/teachers" method="">
                <input class="form-control me-2" type="search" placeholder="Cari Guru..." aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    @if ($teachers->count())
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>NIP</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Jabatan</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->nip }}</td>
                        <td>{{ $teacher->nama }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->jabatan }}</td>
                        <td>
                            <a href="/teachers/{{ $teacher->slug }}" class="badge bg-info"><i class="fa-solid fa-eye align-text-bottom"></i></a>

                            <a href="/teachers/{{ $teacher->slug }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i></a>
                            
                            <form action="/teachers/{{ $teacher->slug }}" method="post" class="d-inline">
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
            {{ $teachers->links() }}
        </div>
    @else
        <h3 class="text-center">No Post Found.</h3>
    @endif
@endsection