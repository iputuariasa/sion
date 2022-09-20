@extends('teachers.layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom">
            <h3 class="text-primary">{{ $title }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong> Silakan Inputkan Absensi
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <form method="POST" action="/myworks/journals/{{ $journal->kode_jurnal }}">
                @method('put')
                @csrf
                <div class="row mb-3">
                  <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Jurnal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $journal->tanggal }}" name="tanggal">
                </div>
                @error('tanggal')
                    <div class="invalid-feedback text-start">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="row mb-3">
                    <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('schedule_id') is-invalid @enderror" id="schedule_id" aria-label="Floating label select example" name="schedule_id" required>
                            <option value="{{ $journal->schedule->id }}">{{ $journal->schedule->study->mapel }} | {{ $journal->schedule->mclass->nama_kelas }}</option>
                            @foreach ($schedules as $schedule)
                              <option value="{{ $schedule->id }}">{{ $schedule->study->mapel }} | {{ $schedule->mclass->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('schedule_id')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="pengajar" class="col-sm-2 col-form-label">Guru Pengajar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pengajar" value="{{ $journal->schedule->teacher->nama }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pertemuanke" class="col-sm-2 col-form-label">Pertemuan Ke</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control @error('pertemuan_ke') is-invalid @enderror" id="pertemuanke" value="{{ $journal->pertemuan_ke }}" name="pertemuan_ke" required>
                    </div>
                    @error('pertemuan_ke')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="materi" class="col-sm-2 col-form-label">Materi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('materi') is-invalid @enderror" id="materi" value="{{ $journal->materi }}" name="materi" required>
                    </div>
                    @error('materi')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('ket') is-invalid @enderror" id="ket" rows="3" name="ket" required>{{ $journal->ket }}</textarea>
                    </div>
                    @error('ket')
                        <div class="invalid-feedback text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-4">
                    <label for="" class="col-sm-2 col-form-label">Status Absensi</label>
                    <div class="col-sm-10 ">
                        <div class="">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" @if ($journal->statusInput != 0)
                            checked
                            @endif disabled>
                            <label class="form-check-label" for="gridCheck1">
                                Sudah Menginput Absensi
                            </label>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" @if ($journal->statusInput == 0)
                            checked
                            @endif disabled>
                            <label class="form-check-label" for="gridCheck1">
                                Belum Menginput Absensi
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class=" col-sm-5 d-flex mt-3 mb-5">
                        <button type="submit" class="btn btn-primary px-5 text-center w-100">Ubah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection