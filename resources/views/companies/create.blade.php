@extends('layouts.master')

@section('title')
    Tambah Data
@endsection

@section('content')
    <form action='{{ url('/companies') }}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="card shadow-sm mb-4">
                {{-- <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="id">
                </div>
                </div> --}}
                <div class="card-header">
                    <h2 class="text-center font-weight-bold">Tambah Data
                    </h2>
                </div>

                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control 
                        @error('name')
                            is-invalid
                        @enderror"
                                placeholder="Tulis namamu" value="{{ old('name') }}" name="name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email"
                                class="form-control 
                        @error('email')
                            is-invalid
                        @enderror"
                                placeholder="Tulis emailmu" value="{{ old('email') }}" name="email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <input type="file"
                                class="form-control 
                        @error('logo')
                            is-invalid
                        @enderror"
                                placeholder="logo" value="{{ old('logo') }}" name="logo">
                            @error('logo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control 
                        @error('website')
                            is-invalid
                        @enderror"
                                placeholder="Tulis websitemu" value="{{ old('website') }}" name="website">
                            @error('website')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>

                    <a href="{{ url('/companies') }}" class="btn btn-danger col-sm">Batal</a>
                </div>
            </div>
        </div>
    </form>
@endsection
