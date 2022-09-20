@extends('admins.layouts.main')

@section('container')
{{-- @dd($classes[1]->schedule) --}}
{{-- @foreach ($classes as $class)
    
@endforeach --}}

    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">{{ $title }}</h4>
                <a href="/schedules/create" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Tambah Jadwal</a>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
       </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-lg-6">
            <form action="/schedules" class="d-flex">
                <select class="form-select" aria-label="Default select example" name="mclass">
                    <option selected value="" >Pilih Kelas...</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->kode_kelas }}">{{ $class->nama_kelas }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary ms-1">Cari</button>
            </form>
        </div>
    </div>
    <div class="row">
        {{-- @dd($schedules) --}}
        @if (request('mclass') && $schedules->count() != 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Hari</td>
                    <td>Jam Pelajaran</td>
                    <td>Jam Ke</td>
                    <td>Mapel</td>
                    <td>Pengajar</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($schedules as $schedule)
                {{-- @dd($schedule->teachers) --}}
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->day->hari }}</td>
                        <td>{{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}</td>
                        <td>{{ $schedule->jamke }}</td>
                        <td>{{ $schedule->study->mapel }}</td>
                        <td>{{ $schedule->teacher->nama }}</td>
                        <td>
                            <a href="/schedules/{{ $schedule->kode_jadwal }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i></a>
                            
                            <form action="/schedules/{{ $schedule->kode_jadwal }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa-solid fa-trash-can align-text-bottom"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="position-absolute bottom-0 start-0 m-3 fixed-bottom">
            <a href="/schedules" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
        </div>
        @else
            <h3 class="text-center mt-5">Silakan tentukan kelas terlebih dahulu!</h3>
            <div class="position-absolute bottom-0 start-0 m-3 fixed-bottom">
                <a href="/schedules" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
            </div>
        @endif
    </div>
    {{-- <div class="row">
        @foreach ($classes as $class)
            <div class="col-lg-3 boxCard">
                <div class="card d-flex justify-content-center align-items-center" style="height: 150px">
                    <div class="row w-100">
                        <div class="col text-center d-flex justify-content-center align-items-center">
                            <h3 class="py-3 text-primary">{{ $class->nama_kelas }}</h3>
                        </div>
                        <hr>
                        <a href="/schedules/mclasses/{{ $class->kode_kelas }}" class="cardName text-center fs-3"><i class="fa-solid fa-calendar-days"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection