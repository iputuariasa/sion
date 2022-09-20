@extends('teachers.layouts.main')

@section('container')
@dd($schedules)
{{-- @foreach ($schedules as $item)
    @dd($item);
    
@endforeach --}}
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom">
            <h3 class="text-primary">{{ $title }}</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputJurnal"><i class="fa-solid fa-circle-plus"></i> Input Jurnal
            </button>
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
    <div class="row">
        <div class="col-12">
            @if (session()->has('cancelled'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('cancelled') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-historyJournal-tab" data-bs-toggle="pill" data-bs-target="#pills-historyJournal" type="button" role="tab" aria-controls="pills-historyJournal" aria-selected="true">History Jurnal</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-dataJournal-tab" data-bs-toggle="pill" data-bs-target="#pills-dataJournal" type="button" role="tab" aria-controls="pills-dataJournal" aria-selected="false">Data Jurnal</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-historyJournal" role="tabpanel" aria-labelledby="pills-historyJournal-tab" tabindex="0">
                    <div class="card shadow">
                        <div class="card-body">
                            {{-- <h4 class="text-primary text-center">History Jurnal</h4> --}}
                            <table class="table table-hover">
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal Jadwal</td>
                                    <td>Mapel</td>
                                    <td>Materi</td>
                                    <td>Aksi</td>
                                </tr>
                                @foreach ($journals as $journal)
                                    @if ($journal->statusInput == 0)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d-M-Y', strtotime($journal->tanggal)) }}</td>
                                            <td>{{ $journal->schedule->study->mapel }}</td>
                                            <td>{{ $journal->materi }}</td>
                                            <td>
                                                <form action="/myworks/journals/{{ $journal->kode_jurnal }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0 p-2" onclick="return confirm('Yakin Ingin Batalkan ?')"> Batalkan</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-dataJournal" role="tabpanel" aria-labelledby="pills-dataJournal-tab" tabindex="0">
                    <div class="card shadow">
                        <div class="card-body">
                            {{-- <h4 class="text-primary text-center">History Jurnal</h4> --}}
                            <table class="table table-hover">
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal Jadwal</td>
                                    <td>Mapel</td>
                                    <td>Materi</td>
                                    <td>Aksi</td>
                                </tr>
                                @foreach ($journals as $journal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-M-Y', strtotime($journal->tanggal)) }}</td>
                                        <td>{{ $journal->schedule->study->mapel }}</td>
                                        <td>{{ $journal->materi }}</td>
                                        <td>
                                            <a href="/myworks/journals/{{ $journal->kode_jurnal }}" class="badge bg-info"><i class="fa-solid fa-eye align-text-bottom"></i></a>
                    
                                            <a href="/myworks/journals/{{ $journal->kode_jurnal }}/edit" class="badge bg-warning"><i class="fa-solid fa-pen-to-square align-text-bottom"></i></a>
                                            
                                            <form action="/myworks/journals/{{ $journal->kode_jurnal }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa-solid fa-trash-can align-text-bottom"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-primary text-center">Mapel Diajar</h4>
                    <table class="table table-hover">
                        <tr>
                            <td>No</td>
                            <td>Mapel</td>
                            <td>Kelas</td>
                        </tr>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedule->study->mapel }}</td>
                                <td>{{ $schedule->mclass->nama_kelas }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $journals->links() }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="inputJurnal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="inputJurnalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="inputJurnalLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/myworks/journals" method="post">
                    @csrf
                    <input type="hidden" name="teacher_id" value="{{ auth()->user()->teacher->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('kode_jurnal') is-invalid @enderror" id="inputkode_jurnal" placeholder="kode_jurnal Pengumuman" name="kode_jurnal" value="JRL-{{ time() }}" required readonly>
                                <label for="inputkode_jurnal" class="ps-4">Kode Jurnal</label>
                                @error('kode_jurnal')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <select class="form-select @error('schedule_id') is-invalid @enderror" id="schedule_id" aria-label="Floating label select example" name="schedule_id" required>
                                  <option >Pilih Mata Pelajaran</option>
                                  @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->study->mapel }} | {{ $schedule->mclass->nama_kelas }} | {{ $schedule->jamke }}</option>
                                  @endforeach
                                </select>
                                <label for="schedule_id" class="ps-4"> Mata Pelajaran</label>
                                @error('schedule_id')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control @error('pertemuan_ke') is-invalid @enderror" id="inputpertemuan_ke" placeholder="pertemuan_ke Pengumuman" name="pertemuan_ke" value="{{ old('pertemuan_ke') }}" required>
                                <label for="inputpertemuan_ke" class="ps-4">Pertemuan Ke</label>
                                @error('pertemuan_ke')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('materi') is-invalid @enderror" id="inputmateri" placeholder="materi Pengumuman" name="materi" value="{{ old('materi') }}" required>
                                <label for="inputmateri" class="ps-4">Materi</label>
                                @error('materi')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control @error('ket') is-invalid @enderror" placeholder="Keterangan Pengumuman" id="ket" style="height: 150px" name="ket">{{ old('ket') }}</textarea>
                                    <label for="ket">Keterangan</label>
                                    @error('ket')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="inputtanggal" placeholder="tanggal Pengumuman" name="tanggal" value="{{ old('tanggal') }}" required>
                                <label for="inputtanggal" class="ps-4">Tanggal</label>
                                @error('tanggal')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection