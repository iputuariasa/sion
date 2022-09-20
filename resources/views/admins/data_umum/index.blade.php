@extends('admins.layouts.main')

@section('container')
    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">Data Umum</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 boxCard">
            <a href="/data_umum/mclasses" class="text-decoration-none">
                <div class="card d-flex justify-content-center align-items-center" style="height: 150px">
                    <div class="row w-100">
                        <div class="col text-center d-flex justify-content-center align-items-center">
                            <div class="col-6">
                                <div class="numbers">{{ $classes->count() }}</div>
                            </div>
                            <div class="col-6">
                                <div class="col text-center d-flex justify-content-center align-items-center iconBx">
                                    <i class="fa-solid fa-people-roof"></i>
                                </div>
                            </div>
                        </div>
                        <div class="cardName text-center fs-5 mt-3">Data Kelas</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 boxCard">
            <a href="/data_umum/school_years" class="text-decoration-none">
                <div class="card d-flex justify-content-center align-items-center" style="height: 150px">
                    <div class="row w-100">
                        <div class="col text-center d-flex justify-content-center align-items-center">
                            <div class="col-6">
                                <div class="numbers">{{ $schoolYears->count() }}</div>
                            </div>
                            <div class="col-6">
                                <div class="col text-center d-flex justify-content-center align-items-center iconBx">
                                    <i class="fa-solid fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="cardName text-center fs-5 mt-3">Data Tahun Pelajaran</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 boxCard">
            <a href="/data_umum/semesters" class="text-decoration-none">
                <div class="card d-flex justify-content-center align-items-center" style="height: 150px">
                    <div class="row w-100">
                        <div class="col text-center d-flex justify-content-center align-items-center">
                            <div class="col-6">
                                <div class="numbers">{{ $semesters->count() }}</div>
                            </div>
                            <div class="col-6">
                                <div class="col text-center d-flex justify-content-center align-items-center iconBx">
                                    <i class="fa-solid fa-seedling"></i>
                                </div>
                            </div>
                        </div>
                        <div class="cardName text-center fs-5 mt-3">Data Semester</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 boxCard">
            <a href="/data_umum/studies" class="text-decoration-none">
                <div class="card d-flex justify-content-center align-items-center" style="height: 150px">
                    <div class="row w-100">
                        <div class="col text-center d-flex justify-content-center align-items-center">
                            <div class="col-6">
                                <div class="numbers">{{ $studies->count() }}</div>
                            </div>
                            <div class="col-6">
                                <div class="col text-center d-flex justify-content-center align-items-center iconBx">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                            </div>
                        </div>
                        <div class="cardName text-center fs-5 mt-3">Data Mata Pelajaran</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection