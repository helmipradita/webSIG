@extends('layouts.back')

@section('content')
    <a href="/dashboard/products/create" class="btn btn-primary mb-3">Create new products</a>
    
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">Table of Products</div>
        
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
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
            </table>
        </div>
    </div>
@endsection