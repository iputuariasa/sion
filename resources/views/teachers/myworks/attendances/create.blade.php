@extends('teachers.layouts.main')

@section('container')
{{-- @dd($journal->schedule->mclass->student) --}}
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
            <h3 class="text-primary">{{ $title }} | {{ $journal->schedule->study->mapel }} ({{ $journal->schedule->mclass->nama_kelas }})</h3>
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <span>Pertemuan Ke {{ $journal->pertemuan_ke }}</span>
                  <span>{{ date('d-M-Y', strtotime($journal->tanggal)) }}</span>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Daftar Siswa</h5>
                  <form action="/myworks/attendances" method="post">
                    @csrf
                    <table class="table table-hover">
                        <tr>
                            <td>No</td>
                            <td>Nis</td>
                            <td>Nama</td>
                            <td>Keterangan</td>
                        </tr>
                        @foreach ($journal->schedule->mclass->student as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->nis }}</td>
                                <td>{{ $student->nama }}</td>
                                <td>
                                    <input type="hidden" name="statusInput" value="1">
                                    <input type="hidden" name="journal_id" value="{{ $journal->id }}">
                                    {{-- <input type="hidden" name="count_siswa" value="{{ count($journal->schedule->mclass->student) }}"> --}}
                                    <input type="hidden" name="student_id-{{ $student->id }}" value="{{ $student->id }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $student->id }}" id="H" value="H">
                                        <label class="form-check-label" for="H">H</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $student->id }}" id="I" value="I">
                                        <label class="form-check-label" for="I">I</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $student->id }}" id="S" value="S">
                                        <label class="form-check-label" for="S">S</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $student->id }}" id="A" value="A">
                                        <label class="form-check-label" for="A">A</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="text-end">
                        <button class="btn btn-primary me-md-2 px-5" type="submit">Simpan</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection