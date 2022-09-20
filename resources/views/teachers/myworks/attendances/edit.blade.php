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
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <span>Pertemuan Ke {{ $journal->pertemuan_ke }}</span>
                  <span>{{ date('d-M-Y', strtotime($journal->tanggal)) }}</span>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Daftar Siswa</h5>
                  @csrf
                  <table class="table table-hover">
                      <tr>
                          <td>No</td>
                          <td>Nis</td>
                          <td>Nama</td>
                          <td>Keterangan</td>
                          <td>Ubah Data</td>
                        </tr>
                        @foreach ($attendances as $attendance)
                            <form action="/myworks/attendances/{{ $attendance->id }}" method="post">
                                @method('put')
                                @csrf
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->student->nis }}</td>
                                <td>{{ $attendance->student->nama }}</td>
                                {{-- <td>{{ $attendance->ket }}</td> --}}
                                <td>
                                    <input type="hidden" name="journal_id" value="{{ $journal->id }}">
                                    <input type="hidden" name="student_id" value="{{ $attendance->student->id }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket" id="H" value="H" @if ($attendance->ket == 'H')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="H">H</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket" id="I" value="I" @if ($attendance->ket == 'I')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="I">I</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket" id="S" value="S" @if ($attendance->ket == 'S')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="S">S</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket" id="A" value="A" @if ($attendance->ket == 'A')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="A">A</label>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-warning">Ubah Data</button>
                                </td>
                            </tr>
                            </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection