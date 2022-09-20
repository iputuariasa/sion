@extends('admins.layouts.main')

@section('container')
@dd($schedules)
{{-- @foreach ($schedules as $schedule) --}}
    {{-- @dd($schedule->study) --}}
    
{{-- @endforeach --}}

    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">{{ $title }}</h4>
            </div>
        </div>
    </div>
    @if ($schedules->count() != 0)
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
                        <td>{{ $schedule->hari }}</td>
                        <td>{{ $schedule->jam_pelajaran }}</td>
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
            <h3 class="text-center">No Post Found.</h3>
            <div class="position-absolute bottom-0 start-0 m-3 fixed-bottom">
                <a href="/schedules" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
            </div>
        @endif
@endsection