@extends('layouts.master')

@section('title')
    Data Employees
@endsection

@section('content')
    <!-- START DATA -->
    <div class="container-fluid">
        <!-- FORM PENCARIAN -->
        <h1 class="text-center font-weight-bold">Data Employees
        </h1>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
                <a href='{{ url('employees/create') }}' class="btn btn-primary">+ Tambah Data</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $id => $item)
                                <tr>
                                    <td>{{ ++$id + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->companies->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href='{{ url('employees/' . $item->id . '/edit') }}'
                                            class="btn btn-warning btn-sm mt-2">Edit</a>

                                        <form class="d-inline" action="{{ url('employees/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger btn-sm mt-2"
                                                onclick="return confirm('Anda Yakin ?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR DATA -->
@endsection
