@extends('layouts.master')

@section('title')
    Edit Data
@endsection

@section('content')
    <form action='{{ url('users/' . $users->id) }}' method='post'>
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
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="{{ $users->username }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" value="{{ $users->password }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label">Pilih</label>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input @error('level')
                            is-invalid
                        @enderror"
                                type="radio" name="level" id="flexRadioDefault1" value="admin"
                                {{ $users->level == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                admin
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input @error('level')
                            is-invalid
                        @enderror"
                                type="radio" name="level" id="flexRadioDefault2" value=user
                                {{ $users->level == 'user' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                user
                            </label>
                        </div>
                        @error('level')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Employees</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="employeId">
                                @foreach ($employees as $d)
                                    <option value="{{ $d->id }}" {{ $users->employeId == $d->id ? 'selected' : '' }}>
                                        {{ $d->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>

                    <a href="{{ url('/users') }}" class="btn btn-danger col-sm">Batal</a>
                </div>
            </div>
        </div>
    </form>
@endsection
