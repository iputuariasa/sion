@extends('general.layouts.main')

@section('container')
    <div class="row mb-3">
        <div class="row m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2 border-bottom">
                <h4 class="text-primary">{{ $title }}</h4>
                <form class="d-flex mb-1" role="search" action="/teacher/announcements" method="">
                    <input class="form-control me-2" type="search" placeholder="Cari Data Pengumuman" aria-label="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    @if (count($announcements) != null)
        @foreach ($announcements as $announcement)
            <div class="row justify-content-center mb-3">
                <div class="col-lg-11">
                    <div class="card text-center">
                        <div class="card-header bg-info">
                            {{ $announcement->judul }}
                        </div>
                        <div class="card-body">
                        <p class="card-text m-0 p-0" style="font-size: 0.9em">{{ $announcement->ket }}</p>
                        @if ($announcement->dokumen != null)
                            <a href="{{ asset('storage/'.$announcement->dokumen) }}" class="badge text-bg-primary text-decoration-none">Download File</a>
                        @endif
                        </div>
                        <div class="card-footer text-muted p-0 m-0" style="font-size: 0.8em">
                        {{ $announcement->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center pagination mt-4">
            {{ $announcements->links() }}
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h4>Pengumuman Tidak Ada!</h4>
            </div>
        </div>
    @endif
@endsection