@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Produk </h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Username</th>
                <th>Tanggal Posting</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allproducts as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->author->username }}</td>
                    <td>{{ $product->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="/dashboard/allproducts/{{ $product->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm bg-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">Hapus</button>
                            
                        </form>
                        {{-- <a href="{{ route('allproducts.edit', $product) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('allproducts.delete', $product) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a> --}}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection