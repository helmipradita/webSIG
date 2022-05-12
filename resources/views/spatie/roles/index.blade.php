@extends('layouts.back')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">Create new Role</div>
        <div class="card-body">
            <form action="{{ route('roles.create') }}" method="post">
                @csrf
                @include('spatie.roles.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Table of Role</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
                @foreach($roles as $index => $role)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->created_at->format("d F Y") }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('roles.delete', $role) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection