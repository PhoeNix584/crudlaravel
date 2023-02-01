@extends('layouts.master')

@section('title')
    Data Companies
@endsection

@section('content')
    <!-- START DATA -->
    <div class="container-fluid">
        <!-- FORM PENCARIAN -->
        <h1 class="text-center font-weight-bold">Data Companies
        </h1>

        <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
                <a href='{{ url('companies/create') }}' class="btn btn-primary me-3">+ Tambah Data</a>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-3">Name</th>
                                <th class="col-md-4">Email</th>
                                <th class="col-md-2">Logo</th>
                                <th class="col-md-2">Website</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $id => $item)
                                <tr>
                                    <td>{{ ++$id + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->logo) }}" width="100px">
                                    </td>
                                    <td>{{ $item->website }}</td>
                                    <td>
                                        <a href='{{ url('companies/' . $item->id . '/edit') }}'
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form class="d-inline" action="{{ url('companies/' . $item->id) }}" method="POST">
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
                </div>
                <div class="mt-2">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR DATA -->
@endsection
