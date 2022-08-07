@extends('dashboard.layouts.main')

@section('content')
    

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Kategori</h1>
        </div>
        <div class="">
            <form action="{{ route('kategori.create') }}" method="post">
                @csrf
                @include('dashboard.kategori.partials.form-control', ['submit' => 'Tambah'])
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Kategori</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->slug }}</td>
                        {{-- <td>{{ implode(', ', $data->getPermissionNames()->toArray()) }}</td>
                        <td>
                            <a href="{{ route('assign.edit', $data) }}" class="btn btn-primary btn-sm">Sync</a>
                        </td> --}}
                        <td>
                            <a href="kategori/edit/{{ $data->id }}" class="btn btn-primary btn-sm">Edit</a>
                            
                            <a href="kategori/delete/{{ $data->id }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection