@extends('layouts.master')

@section('title')
    Edit Data
@endsection

@section('content')
    <form action='{{ url('employees/' . $employees->id) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="card shadow-sm mb-4">
                {{-- <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="id_employees">
                </div>
                </div> --}}

                <div class="card-header">
                    <h2 class="text-center font-weight-bold">Update Data
                    </h2>
                </div>

                <div class="card-body">

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control
                        @error('name')
                            is-invalid
                        @enderror"
                                placeholder="Tulis namamu" name="name" value="{{ $employees->name }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="companyId">
                                <option disabled>--Pilih Company--</option>
                                @foreach ($companies as $d)
                                    <option value="{{ $d->id }}"
                                        {{ $employees->companyId == $d->id ? 'selected' : '' }}>
                                        {{ $d->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email"
                                class="form-control @error('email')
                            is-invalid
                        @enderror"
                                placeholder="Tulis namamu" name="email" value="{{ $employees->email }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>

                    <a href="{{ session('halaman_url') }}" class="btn btn-danger col-sm">Batal</a>
                </div>
            </div>
        </div>
    </form>
@endsection
