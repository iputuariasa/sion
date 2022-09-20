@extends('admins.layouts.main')

@section('container')
    <div class="row pt-3">
        <div class="col-12 d-flex pt-3 pb-2 mb-2 border-bottom d-flex align-items-center align-self-center">
            <h4 class="text-primary m-0 pe-5">Tambah Guru</h4>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="/teachers"><a href="/teachers" class="text-decoration-none text-secondary"> Data Guru</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="/teachers/create" class="text-decoration-none text-secondary"> Tambah Guru</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form class="p-5 mb-4 mt-3 bg-white text-dark rounded" action="/teachers" method="POST">
                @csrf
                <div class="mb-3">
                    <h4>Form Entry Guru</h4>
                    <hr>
                </div>
                <input type="hidden" name="role" value="teacher">
                <div class="mb-3">
                  <label for="nip" class="form-label">NIP</label>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="NIP" name="nip">
                  @error('nip')
                    <div class="invalid-feedback text-start">
                    {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-5">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama dan Gelar" name="nama">
                  @error('nama')
                    <div class="invalid-feedback text-start">
                    {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class=" mb-3 text-center">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
              </form>
        </div>
    </div>
@endsection