@extends('teachers.layouts.main')

@section('container')
    <div class="row">
        <div class="row m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2 border-bottom">
                <h4 class="text-primary">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <div class="row mb-2 d-flex justify-content-center">
        <div class="col-md-8">
            <form class="d-flex" role="search" action="/civitas/search_student" method="">
                <input class="form-control me-2" type="search" placeholder="Cari Siswa..." aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <small class="text-muted fst-italic">**Cari berdasarkan nama, nim, email</small>
        </div>
    </div>

    @if (request('search'))
        <div class="row justify-content-center">
            @foreach ($students as $student)
                <div class="col-lg-5">
                    <div class="card">
                        <img src="/img/imgCard.jpg" class="card-img-top" alt="...">
                        <div class="text-center" style="margin-top: -70px">
                            <img src="{{ asset('storage/'.$student->user->foto) }}" class="rounded-circle" alt="..." width="35%">
                        </div>
                        <div class="card-body text-center">
                            <span class="d-block fs-5 fw-semibold">{{ $student->nama }}</span>
                            <span class="d-block fs-6 fw-semibold">{{ $student->nis }}</span>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExampleDetail{{ $student->id }}" aria-expanded="false" aria-controls="collapseExampleDetail{{ $student->id }}">
                                Lihat Detail
                            </button>
                            <div class="collapse mt-2" id="collapseExampleDetail{{ $student->id }}">
                                <div class="card card-body text-start">
                                    <table class="w-100">
                                        <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $student->email }}</td>
                                        </tr>
                                        <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $student->telepon }}</td>
                                        </tr>
                                        <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $student->jk }}</td>
                                        </tr>
                                        <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td>{{ $student->agama }}</td>
                                        </tr>
                                        <tr>
                                        <td>Tahun Angkatan</td>
                                        <td>:</td>
                                        <td>{{ $student->tahun_angkatan }}</td>
                                        </tr>
                                        <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $student->alamat }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection