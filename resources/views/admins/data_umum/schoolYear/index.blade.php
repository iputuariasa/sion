@extends('admins.layouts.main')

@section('container')
    {{-- @dd($schoolYears->count()) --}}
    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">Data Tahun Pelajaran</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTahunPelajaran">
                        Tambah Tahun Pelajaran
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
        @if ($schoolYears->count() != 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Tahun Pelajaran</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($schoolYears as $schoolYear)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schoolYear->tahun_pelajaran }}</td>
                        <td>
                            @if ($schoolYear->status == 'Nonaktif')
                                Tidak Aktif
                            @else
                                Aktif
                            @endif
                        </td>
                        <td>
                            @if ($schoolYear->status == 'Aktif')
                                <form action="/data_umum/school_years/{{ $schoolYear->id }}" method="post" class="d-inline">
                                @csrf
                                    @method('put')
                                    <input type="hidden" name="tahun_pelajaran" value="{{ $schoolYear->tahun_pelajaran }}">
                                    <input type="hidden" name="status" value="Nonaktif">
                                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Nonaktifkan ?')"><i class="fa-solid fa-circle-xmark"></i> Nonaktifkan</button>
                                </form>
                            @else
                                <form action="/data_umum/school_years/{{ $schoolYear->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="tahun_pelajaran" value="{{ $schoolYear->tahun_pelajaran }}">
                                    <input type="hidden" name="status" value="Aktif">
                                    <input type="hidden" name="confirmAktif" value="{{ $confirmAktif->count() }}">
                                    <button class="badge bg-success border-0" onclick="return confirm('Yakin Ingin Aktifkan ?')"><i class="fa-solid fa-circle-check"></i> Aktifkan</button>
                                </form>
                            @endif

                            

                            <a href="" type="button" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $schoolYear->id }}">
                                <i class="fa-solid fa-pen-to-square align-text-bottom"></i>
                            </a>
                              
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $schoolYear->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{ $schoolYear->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdrop{{ $schoolYear->id }}Label">Edit Tahun Pelajaran {{ $schoolYear->tahun_pelajaran }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/data_umum/school_years/{{ $schoolYear->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control @error('tahun_pelajaran') is-invalid @enderror" id="inputTahunPelajaran" placeholder="Tahun Pelajaran" name="tahun_pelajaran" value="{{ old('tahun_pelajaran', $schoolYear->tahun_pelajaran) }}" required autofocus>
                                                    <label for="inputTahunPelajaran" class="ps-4">Tahun Pelajaran</label>
                                                    @error('tahun_pelajaran')
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
                            
                            <form action="/data_umum/school_years/{{ $schoolYear->id }}" method="post" class="d-inline">
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
                **Hanya Boleh Mengaktifkan Satu Tahun Pelajaran Saja!**
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
        
    
    <!-- Modal -->
        <div class="modal fade" id="tambahTahunPelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahTahunPelajaranLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="tambahTahunPelajaranLabel">Tambah Tahun Pelajaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data_umum/school_years" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="status" value="Nonaktif">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('tahun_pelajaran') is-invalid @enderror" id="inputTahunPelajaran" placeholder="Contoh : 2020/2021" name="tahun_pelajaran" value="{{ old('tahun_pelajaran') }}" required autofocus>
                                    <label for="inputTahunPelajaran" class="ps-4">Contoh : 2020/2021</label>
                                    @error('tahun_pelajaran')
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