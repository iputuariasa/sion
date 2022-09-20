@extends('teachers.layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom">
            <h3 class="text-primary">{{ $title }}</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <form>
                <div class="row mb-3">
                  <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Jurnal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tanggal" value="{{ date('d-M-Y', strtotime($journal->tanggal)) }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="mapel" value="{{ $journal->schedule->study->mapel }} | {{ $journal->schedule->mclass->nama_kelas }}" readonly>
                    </div>
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
                      <input type="text" class="form-control" id="pertemuanke" value="{{ $journal->pertemuan_ke }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="materi" class="col-sm-2 col-form-label">Materi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="materi" value="{{ $journal->materi }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="ket" rows="3" readonly>{{ $journal->ket }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
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
                <a href="/myworks/journals" class="btn btn-success mt-2 mb-5"><i class="fa-solid fa-left-long"></i> Kembali</a>
            </form>
        </div>
    </div>
@endsection