@extends('layouts.master')

@section('title')
    Tambah Data
@endsection

@section('content')
    <form action='{{ url('/employees') }}' method='post'>
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
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control
                        @error('name')
                            is-invalid
                        @enderror"
                                placeholder="Tulis namamu" value="{{ old('name') }}" name="name" id="name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <select
                                class="form-select 
                                @error('companyId')
                                    is-invalid
                                @enderror"
                                aria-label="Default select example" name="companyId">
                                <option selected disabled>--Pilih Company--</option>
                                @foreach ($companies as $c)
                                    <option value="{{ $c->id }}">
                                        {{ $c->name }}</option>
                                    </option>
                                @endforeach
                            </select>
                            @error('companyId')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control @error('email')
                            is-invalid
                        @enderror"
                                placeholder="Tulis emailmu" value="{{ old('email') }}" name="email" id="email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>

                    <a href="{{ url('/employees') }}" class="btn btn-danger col-sm">Batal</a>
                </div>
            </div>
        </div>
    </form>
@endsection
