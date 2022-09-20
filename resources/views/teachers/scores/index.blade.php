@extends('teachers.layouts.main')

@section('container')
    <div class="row">
        <div class="row m-0">
            <div class="col-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-2 border-bottom">
                <h4 class="text-primary">{{ $title }}</h4>
            </div>
        </div>
    </div>
    @dd($schedules)
@endsection