@extends('admins.layouts.main')

@section('container')
    {{-- @dd($studies->count()) --}}
    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">Data Mata Pelajaran</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMataPelajaran">
                        Tambah Mata Pelajaran
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
        <div class="row">
            <div class="col-12">
                @if (session()->has('error'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        @if ($studies->count() != 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Kode Mapel</td>
                    <td>Mata Pelajaran</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($studies as $study)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $study->kode_mapel }}</td>
                        <td>{{ $study->mapel }}</td>
                        <td>
                            <a href="" type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $study->id }}">
                                <i class="fa-solid fa-pen-to-square align-text-bottom"></i>
                            </a>
                              
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $study->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{ $study->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdrop{{ $study->id }}Label">Edit Mata Pelajaran {{ $study->mapel }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data_umum/studies/{{ $study->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control @error('mapel') is-invalid @enderror" id="inputMataPelajaran" placeholder="Mata Pelajaran" name="mapel" value="{{ old('mapel', $study->mapel) }}" required autofocus>
                                                    <label for="inputMataPelajaran" class="ps-4">Mata Pelajaran</label>
                                                    @error('mapel')
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
                            
                            <form action="/data_umum/studies/{{ $study->id }}" method="post" class="d-inline">
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
        <div class="modal fade" id="tambahMataPelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahMataPelajaranLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="tambahMataPelajaranLabel">Tambah Mata Pelajaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data_umum/studies" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('kode_mapel') is-invalid @enderror" id="inputKodeMapel" placeholder="Kode Mapel" name="kode_mapel" value="MP-{{ time() }}" required readonly>
                                    <label for="inputKodeMapel" class="ps-4">Kode Mapel</label>
                                    @error('kode_mapel')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('mapel') is-invalid @enderror" id="inputMataPelajaran" placeholder="Mata Pelajaran" name="mapel" value="{{ old('mapel') }}" required autofocus>
                                    <label for="inputMataPelajaran" class="ps-4">Mata Pelajaran</label>
                                    @error('mapel')
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