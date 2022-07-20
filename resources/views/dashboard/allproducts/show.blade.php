@extends('dashboard.layouts.main')

@section('content')
    {{-- <div class="card mb-4">
        <div class="card-header">My Products</div>
        <div class="card-body">
            <form action="{{ route('permissions.create') }}" method="post">
                @csrf
                @include('spatie.permissions.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div> --}}
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h1 class="mb-3">{{ $product->title }}</h1>

                <a href="/dashboard/products" class="btn btn-success">Back to all my products</a>
                <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-warning">Edit</a>
                <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn bg-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">Hapus</button>
                    
                </form>

                @if ($product->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/'. $product->image) }}" alt="" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $product->category->name }}" class="card-img-top mt-3" alt="{{ $product->category->name }}" class="img-fluid mt-3">
                @endif

                <article class="my-3 fs-5">
                    {!! $product->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection