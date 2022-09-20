@extends('admins.layouts.main')

@section('container')
{{-- @dd($days) --}}
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center">
            <h4 class="text-primary m-0 pe-5">Ubah Jadwal</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="/schedules"><a href="/schedules" class="text-decoration-none text-secondary"> Data Jadwal</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/schedules/{{ $schedule->kode_jadwal }}/edit" class="text-decoration-none text-secondary"> Ubah Jadwal</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <form class="p-5 mb-4 mt-3 bg-white text-dark rounded" action="/schedules/{{ $schedule->kode_jadwal }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <h4>Form Entry Jadwal</h4>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <label for="kode_jadwal">Kode Jadwal</label>
                        <input id="kode_jadwal" type="text" class="form-control @error('kode_jadwal') is-invalid @enderror" name="kode_jadwal" readonly value="{{ $schedule->kode_jadwal}}">
                        @error('kode_jadwal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="tahun_pelajaran">Tahun Pelajaran</label>
                        {{-- @foreach ($schoolYears as $schoolYear) --}}
                            <input type="hidden" name="schoolYear_id" value="{{ $schedule->schoolYear->id }}">
                            <input id="tahun_pelajaran" type="text" class="form-control" readonly placeholder="{{ $schedule->schoolYear->tahun_pelajaran }}">
                        {{-- @endforeach --}}
                    </div>
                    <div class="col-lg-4">
                        <label for="semester">Semester</label>
                        {{-- @foreach ($semesters as $semester) --}}
                            <input type="hidden" name="semester_id" value="{{ $schedule->semester->id }}">
                            <input id="semester" type="text" class="form-control" readonly placeholder="{{ $schedule->semester->semester }}">
                        {{-- @endforeach --}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="teacher_id">Guru Mata Pelajaran</label>
                        <select class="form-select" aria-label="Default select example" name="teacher_id">
                            <option selected>-- Pilih Guru --</option>
                            @foreach ($teachers as $teacher)
                                @if (old('teacher_id', $schedule->teacher_id) == $teacher->id)
                                    <option selected value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                                @else
                                    <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                                @endif
                            @endforeach
                          </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="study_id">Mata Pelajaran</label>
                        <select class="form-select" aria-label="Default select example" name="study_id">
                            <option selected>-- Pilih Mata Pelajaran --</option>
                            @foreach ($studies as $study)
                                @if (old('study_id', $schedule->study_id) == $study->id)
                                    <option selected value="{{ $study->id }}">{{ $study->mapel }}</option>
                                @else
                                    <option value="{{ $study->id }}">{{ $study->mapel }}</option>
                                @endif
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="">Hari</label>
                    @foreach ($days as $day)
                        <div class="col-lg-3">
                            <div class="form-check">
                                @if (old('day_id', $schedule->day_id) == $day->id)
                                    <input class="form-check-input" type="radio" name="day_id" id="{{ $day->hari }}" value="{{ $day->id }}" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="day_id" id="{{ $day->hari }}" value="{{ $day->id }}">
                                @endif
                                <label class="form-check-label" for="{{ $day->hari }}">
                                    {{ $day->hari }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4">
                        <label for="mclass">Kelas</label>
                        <select class="form-select" aria-label="Default select example" required name="mclass_id">
                            <option selected>-- Pilih Kelas --</option>
                            @foreach ($classes as $class)
                                @if (old('mclass_id', $schedule->mclass_id) == $class->id)
                                    <option selected value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                                @else
                                    <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="jam_pelajaran">Waktu Pelajaran</label>
                        <div class="d-flex align-items-center">
                            <input type="time" name="jam_mulai" id="" class="form-control" required value="{{ old('jam_mulai', $schedule->jam_mulai) }}">
                            <span class="mx-2"> - </span>
                            <input type="time" name="jam_selesai" id="" class="form-control" required value="{{ old('jam_selesai', $schedule->jam_selesai) }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label for="jamke">Jam Ke</label>
                        <input id="jamke" type="text" class="form-control @error('jamke') is-invalid @enderror" name="jamke" value="{{ old('jamke', $schedule->jamke) }}" placeholder="1-2" required>
                        @error('kode_jadwal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection