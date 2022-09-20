@extends('admins.layouts.main')

@section('container')
    {{-- @dd($class) --}}
    <div class="row">
        <div class="row pt-3 m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
                <h4 class="text-primary">{{ $title }}</h4>
            </div>
        </div>
        @if ($class->count() != 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <tr class="table-info">
                    <td>No</td>
                    <td>Nis</td>
                    <td>Nama</td>
                    <td>Jenis Kelamin</td>
                </tr>
                @foreach ($class as $itemclass)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $itemclass->nis }}</td>
                        <td>{{ $itemclass->nama }}</td>
                        <td>{{ $itemclass->jk }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="position-absolute bottom-0 start-0 m-3 fixed-bottom">
            <a href="/data_umum/mclasses" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
        </div>
        @else
            <h3 class="text-center">No Post Found.</h3>
            <div class="position-absolute bottom-0 start-0 m-3 fixed-bottom">
                <a href="/data_umum/mclasses" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
            </div>
        @endif
        {{-- <div class="d-flex justify-content-center">
            {{ $class->links() }}
        </div> --}}
    </div>
    

@endsection