@extends('teachers.layouts.main')

@section('container')
{{-- @dd($attendances) --}}
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
            <h3 class="text-primary">{{ $title }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex flex-row">
                        <div class="col-6">
                            <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-calendar-days fs-2"></i>
                                <h6>Absensi</h6>
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExampleAbout" aria-expanded="false" aria-controls="collapseExampleAbout">
                                <i class="fa-solid fa-circle-info fs-2"></i>
                                <h6>About</h6>
                            </button>
                        </div>
                    </div>
                    <div class="collapse mt-2" id="collapseExampleAbout">
                        <div class="card card-body">
                            Aplikasi Absensi siswa ini dibuat untuk mendokumentasikan kehadiran siswa, Aplikasi sangat Mudah digunakan (Berbasis Web)
                        </div>
                    </div>
                    <div class="collapse mt-2" id="collapseExample">
                        <div class="card card-body">
                            @foreach ($journals as $journal)
                            @if ($journal->statusInput == 0)
                                <a href="/myworks/attendances/create?journal={{ $journal->kode_jurnal }}" class="d-flex flex-column">
                                    <button class="btn btn-primary mb-2" type="button">{{ $journal->schedule->study->mapel }} ({{$journal->schedule->mclass->nama_kelas}})</button>
                                </a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form class="d-flex" role="search" action="/myworks/attendances" method="">
                                <input class="form-control me-2" type="search" placeholder="Cari Absensi..." aria-label="Search" name="search" value="{{ request('search') }}">
                                <button class="btn btn-outline-success" type="submit">Cari</button>
                            </form>
                            <table class="table table-hover mt-3">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Jurnal</th>
                                    <th>Mapel</th>
                                    <th>Pertemuan</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($journals as $journal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-M-Y', strtotime($journal->tanggal)) }}</td>
                                        <td>{{ $journal->schedule->study->mapel }} | {{$journal->schedule->mclass->nama_kelas}}</td>
                                        <td>{{ $journal->pertemuan_ke }}</td>
                                        <td>
                                            <a href="/myworks/attendances/showAttendance?journal={{ $journal->kode_jurnal }}&journal_id={{ $journal->id }}" class="badge bg-info"><i class="fa-solid fa-eye align-text-bottom"></i></a>

                                            <a href="/myworks/attendances/editAttendance?journal={{ $journal->kode_jurnal }}&journal_id={{ $journal->id }}" class="badge bg-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection