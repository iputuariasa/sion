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
            <form class="d-flex" role="search" action="/civitas/search_teacher" method="">
                <input class="form-control me-2" type="search" placeholder="Cari Guru..." aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <small class="text-muted fst-italic">**Cari berdasarkan nama, nip, jabatan</small>
        </div>
    </div>

    @if (request('search'))
        <div class="row justify-content-center">
            @foreach ($teachers as $teacher)
                <div class="col-lg-5">
                    <div class="card">
                        <img src="/img/imgCard.jpg" class="card-img-top" alt="...">
                        <div class="text-center" style="margin-top: -70px">
                            <img src="{{ asset('storage/'.$teacher->user->foto) }}" class="rounded-circle" alt="..." width="35%">
                        </div>
                        <div class="card-body text-center">
                            <span class="d-block fs-5 fw-semibold">{{ $teacher->nama }}</span>
                            <span class="d-block fs-6 fw-semibold">{{ $teacher->nip }}</span>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExampleDetail{{ $teacher->id }}" aria-expanded="false" aria-controls="collapseExampleDetail{{ $teacher->id }}">
                                Lihat Detail
                            </button>
                            <div class="collapse mt-2" id="collapseExampleDetail{{ $teacher->id }}">
                                <div class="card card-body text-start">
                                    <table class="w-100">
                                        <tr>
                                          <td>NIP</td>
                                          <td>:</td>
                                          <td>{{ $teacher->nip }}</td>
                                        </tr>
                                        <tr>
                                          <td>Jabatan</td>
                                          <td>:</td>
                                          <td>{{ $teacher->jabatan }}</td>
                                        </tr>
                                        <tr>
                                          <td>Telepon</td>
                                          <td>:</td>
                                          <td>{{ $teacher->telepon }}</td>
                                        </tr>
                                        <tr>
                                          <td>Agama</td>
                                          <td>:</td>
                                          <td>{{ $teacher->agama }}</td>
                                        </tr>
                                        <tr>
                                          <td>Jenis Kelamin</td>
                                          <td>:</td>
                                          <td>{{ $teacher->jk }}</td>
                                        </tr>
                                        <tr>
                                          <td>Alamat</td>
                                          <td>:</td>
                                          <td>{{ $teacher->alamat }}</td>
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