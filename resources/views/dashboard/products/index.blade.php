@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produk Saya </h1>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/products/create" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="/dashboard/products/{{ $product->slug }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm bg-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">Hapus</button>
                            
                        </form>
                        {{-- <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('products.delete', $product) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm">Delete</a> --}}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection