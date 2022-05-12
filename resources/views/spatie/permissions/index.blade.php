@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header"><b>Create new Permission</b></div>
        <div class="card-body">
            <form action="{{ route('permissions.create') }}" method="post">
                @csrf
                @include('spatie.permissions.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><b>Table of Permission</b></div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
                @foreach($permissions as $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->created_at->format("d F Y") }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('permissions.delete', $permission) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection