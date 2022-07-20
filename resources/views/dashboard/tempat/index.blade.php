@extends('dashboard.layouts.main')

@section('content')
    <div class="mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
    </div>
    
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Tempat</h1>
        </div>
        <div class="">
            <form action="{{ route('tempat.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.tempat.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tempat</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Tempat</th>
                    <th>Kecamatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tempat as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nama_tempat }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        {{-- <td>{{ implode(', ', $data->getPermissionNames()->toArray()) }}</td>
                        <td>
                            <a href="{{ route('assign.edit', $data) }}" class="btn btn-primary btn-sm">Sync</a>
                        </td> --}}
                        <td>
                            <a href="tempat/edit/{{ $data->id_tempat }}" class="btn btn-info">Edit</a>
                            
                            <a href="tempat/delete/{{ $data->id_tempat }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection