@extends('layouts.master')

@section('title')
    Tambah Data
@endsection

@section('content')
    <form action='{{ url('/users') }}' method='post'>
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
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control @error('username')
                            is-invalid
                        @enderror"
                                placeholder="Tulis usernamemu" value="{{ old('username') }}" name="username">
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password"
                                class="form-control @error('password')
                            is-invalid
                        @enderror"
                                placeholder="Tulis password" value="{{ old('password') }}" name="password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Pilih</label>
                        <div class="form-check form-check-inline col-sm">
                            <input
                                class="form-check-input @error('level')
                            is-invalid
                        @enderror"
                                type="radio" name="level" id="flexRadioDefault1" value="admin"
                                {{ old('level') == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Admin
                            </label>
                        </div>
                        <div class="form-check form-check-inline col-sm">
                            <input
                                class="form-check-input @error('level')
                            is-invalid
                        @enderror"
                                type="radio" name="level" id="flexRadioDefault2" value="user"
                                {{ old('level') == 'user' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                User
                            </label>
                        </div>
                        @error('level')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Employees</label>
                        <div class="col-sm-10">
                            <select
                                class="form-select @error('employeId')
                            is-invalid
                        @enderror"
                                aria-label="Default select example" name="employeId">
                                <option selected disabled>--Pilih Employees--</option>
                                @foreach ($employees as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('employeId')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>

                    <a href="{{ url('/users') }}" class="btn btn-danger col-sm">Batal</a>
                </div>
            </div>
        </div>
    </form>
@endsection
