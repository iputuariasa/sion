@extends('teachers.layouts.main')

@section('container')
{{-- @dd($attendances) --}}
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
            <h3 class="text-primary">{{ $title }} | {{ $journal->schedule->study->mapel }} ({{ $journal->schedule->mclass->nama_kelas }})</h3>
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
                  <form action="/myworks/attendances" method="post">
                    @csrf
                    <table class="table table-hover">
                        <tr>
                            <td>No</td>
                            <td>Nis</td>
                            <td>Nama</td>
                            <td>Keterangan</td>
                        </tr>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->student->nis }}</td>
                                <td>{{ $attendance->student->nama }}</td>
                                {{-- <td>{{ $attendance->ket }}</td> --}}
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $attendance->student->id }}" id="H" value="H" disabled @if ($attendance->ket == 'H')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="H">H</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $attendance->student->id }}" id="I" value="I" disabled @if ($attendance->ket == 'I')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="I">I</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $attendance->student->id }}" id="S" value="S" disabled @if ($attendance->ket == 'S')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="S">S</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ket-{{ $attendance->student->id }}" id="A" value="A" disabled @if ($attendance->ket == 'A')
                                            checked
                                        @endif>
                                        <label class="form-check-label" for="A">A</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection