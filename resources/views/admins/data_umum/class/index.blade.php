@extends('admins.layouts.main')

@section('container')
    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">Data Kelas</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKelas"><i class="fa-solid fa-circle-plus"></i> Tambah Kelas
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
        @if ($classes->count() != 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Kode Kelas</td>
                    <td>Nama Kelas</td>
                    <td>Wali Kelas</td>
                    <td>Jumlah Siswa</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($classes as $class)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $class->kode_kelas }}</td>
                        <td>{{ $class->nama_kelas }}</td>
                        <td>{{ $class->teacher->nama }}</td>
                        <td>
                            <a href="/data_umum/mclasses/{{ $class->kode_kelas }}" class="badge bg-primary text-decoration-none">{{ $class->student->count() }} <i class="fa-solid fa-users align-text-bottom"></i></a>
                        </td>
                        <td>
                            {{-- <a href="/data_umum/mclasses/{{ $class->kode_kelas }}" class="badge bg-info"><i class="fa-solid fa-eye align-text-bottom"></i></a> --}}
                            
                            <!-- Button trigger modal -->
                            <a href="" type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $class->id }}">
                                <i class="fa-solid fa-pen-to-square align-text-bottom"></i>
                            </a>
                              
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $class->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{ $class->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdrop{{ $class->id }}Label">Edit Kelas {{ $class->nama_kelas }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data_umum/mclasses/{{ $class->kode_kelas }}" method="POST">
                                    @method('put')
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="inputNamaKelas" placeholder="Nama Kelas" name="nama_kelas" value="{{ old('nama_kelas', $class->nama_kelas) }}" required autofocus>
                                                    <label for="inputNamaKelas" class="ps-4">Nama Kelas</label>
                                                    @error('nama_kelas')
                                                    <div class="invalid-feedback text-start">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-floating">
                                                    <select class="form-select" id="category_id" aria-label="Floating label select example" name="teacher_id">
                                                        @foreach ($teachers as $teacher)
                                                        @if (old('category_id') == $teacher->id)
                                                            <option selected value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                                                        @else
                                                            <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                    <label class="ps-4" for="floatingSelect"> Wali Kelas</label>
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
                            
                            <form action="/data_umum/mclasses/{{ $class->kode_kelas }}" method="post" class="d-inline">
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
    </div>

    <!-- Button trigger modal -->
        
    
    <!-- Modal -->
        <div class="modal fade" id="tambahKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahKelasLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="tambahKelasLabel">Tambah Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data_umum/mclasses" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('kode_kelas') is-invalid @enderror" id="inputKodeKelas" placeholder="Kode Kelas" name="kode_kelas" value="KL-{{ time() }}" required readonly>
                                    <label for="inputKodeKelas" class="ps-4">Kode Kelas</label>
                                    @error('kode_kelas')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="inputNamaKelas" placeholder="Nama Kelas" name="nama_kelas" value="{{ old('nama_kelas') }}" required autofocus>
                                    <label for="inputNamaKelas" class="ps-4">Nama Kelas</label>
                                    @error('nama_kelas')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="waliKelas" class="form-label">Wali Kelas</label>
                                    <select class="form-select" name="teacher_id" id="waliKelas">
                                        <option selected>Pilih Wali Kelas</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                                        @endforeach
                                    </select>
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
        
        <!-- Button trigger modal -->
        
      
    <!-- Modal -->
    

@endsection