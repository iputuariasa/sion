@extends('admins.layouts.main')

@section('container')
    {{-- @dd($semesters->count()) --}}
    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">Data Semester</h4>
                @if ($semesters->count() >= 2)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSemester" disabled>
                        Tambah Semester
                    </button>
                @else
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSemester">
                        Tambah Semester
                    </button>
                @endif
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSemester">
                    Tambah Semester
                </button> --}}
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
        <div class="row">
            <div class="col-12">
                @if (session()->has('error'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        @if ($semesters->count() != 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Semester</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($semesters as $semester)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $semester->semester }}</td>
                        <td>
                            @if ($semester->status == 'Nonaktif')
                                Tidak Aktif
                            @else
                                Aktif
                            @endif
                        </td>
                        <td>
                            @if ($semester->status == 'Aktif')
                                <form action="/data_umum/semesters/{{ $semester->id }}" method="post" class="d-inline">
                                @csrf
                                    @method('put')
                                    <input type="hidden" name="semester" value="{{ $semester->semester }}">
                                    <input type="hidden" name="status" value="Nonaktif">
                                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Nonaktifkan ?')"><i class="fa-solid fa-circle-xmark"></i> Nonaktifkan</button>
                                </form>
                            @else
                                <form action="/data_umum/semesters/{{ $semester->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="semester" value="{{ $semester->semester }}">
                                    <input type="hidden" name="status" value="Aktif">
                                    <input type="hidden" name="confirmAktif" value="{{ $confirmAktif->count() }}">
                                    <button class="badge bg-success border-0" onclick="return confirm('Yakin Ingin Aktifkan ?')"><i class="fa-solid fa-circle-check"></i> Aktifkan</button>
                                </form>
                            @endif

                            

                            <a href="" type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $semester->id }}">
                                <i class="fa-solid fa-pen-to-square align-text-bottom"></i>
                            </a>
                              
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $semester->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{ $semester->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdrop{{ $semester->id }}Label">Edit Semester {{ $semester->semester }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data_umum/semesters/{{ $semester->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control @error('semester') is-invalid @enderror" id="inputSemester" placeholder="Semester" name="semester" value="{{ old('semester', $semester->semester) }}" required autofocus>
                                                    <label for="inputSemester" class="ps-4">Semester</label>
                                                    @error('semester')
                                                    <div class="invalid-feedback text-start">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            
                            <form action="/data_umum/semesters/{{ $semester->id }}" method="post" class="d-inline">
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
            <h3 class="text-center">No Post Found.</h3>
        @endif
        <div class="row mt-4">
            <div class=" text-danger text-end">
                **Hanya Boleh Mengaktifkan Satu Semester Saja!**
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
        
    
    <!-- Modal -->
        <div class="modal fade" id="tambahSemester" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahSemesterLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="tambahSemesterLabel">Tambah Semester</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data_umum/semesters" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="status" value="Nonaktif">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('semester') is-invalid @enderror" id="inputSemester" placeholder="Semester" name="semester" value="{{ old('semester') }}" required autofocus>
                                    <label for="inputSemester" class="ps-4">Semester</label>
                                    @error('semester')
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