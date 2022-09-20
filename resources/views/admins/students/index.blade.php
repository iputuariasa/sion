@extends('admins.layouts.main')

@section('container')
{{-- @dd($students) --}}
<div class="row">
    <div class="row pt-3 m-0">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
            <h4 class="text-primary">Data Siswa</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa"><i class="fa-solid fa-circle-plus"></i> 
                Tambah Siswa
            </button>
            {{-- <a href="/students/create" class="btn btn-primary">Tambah Siswa</a> --}}
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
            <form class="d-flex" role="search" action="/students" method="">
                <input class="form-control me-2" type="search" placeholder="Cari Siswa..." aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    @if ($students->count() != 0)
    <div class="table-responsive">
        <table class="table table-hover">
            <tr class="table-info">
                <td>No</td>
                <td>Nis</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Kelas</td>
                <td>Aksi</td>
            </tr>
            @foreach ($students as $student)
            {{-- @dd($student->class) --}}
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->class->nama_kelas }}</td>
                    <td>
                        <a href="/students/{{ $student->slug }}" class="badge bg-info"><i class="fa-solid fa-eye align-text-bottom"></i></a>

                        <a href="/students/{{ $student->slug }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i></a>
                        
                        <form action="/students/{{ $student->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa-solid fa-trash-can align-text-bottom"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <h3 class="text-center">Data Siswa Tidak Ada!</h3>
    @endif
</div>

<!-- Button trigger modal -->
    
  
  <!-- Modal -->
    <div class="modal fade" id="tambahSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="tambahSiswaLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/students" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="role" value="student">
                        <div class="row">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="inputNis" placeholder="nis" name="nis" value="{{ old('nis') }}" required autofocus>
                                <label for="inputNis" class="ps-4">NIS</label>
                                @error('nis')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama" placeholder="nama" name="nama" value="{{ old('nama') }}" required autofocus>
                                <label for="inputNama" class="ps-4">Nama</label>
                                @error('nama')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select" id="class" aria-label="Floating label select example" name="class_id">
                                  <option selected>-- Pilih Kelas --</option>
                                  @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                                  @endforeach
                                </select>
                                <label for="class" class="ps-4">Kelas</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('tahun_angkatan') is-invalid @enderror" id="inputtahun_angkatan" placeholder="tahun_angkatan" name="tahun_angkatan" value="{{ old('tahun_angkatan') }}" required autofocus>
                                <label for="inputtahun_angkatan" class="ps-4">Tahun Angkatan</label>
                                @error('tahun_angkatan')
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