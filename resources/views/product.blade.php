@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div >
                    <a href="{{ URL::previous() }}" class="text-decoration-none">
                        <span data-feather="arrow-left"></span>
                            Kembali ke Produk
                    </a>
                </div>
                <h1 class="mb-3">{{ $product->title }}</h1>

                <p>By.  <a href="/products?author={{ $product->author->username }}" class="text-decoration-none">{{ $product->author->name }}</a> in <a href="/products?category={{ $product->category->slug }}" class="text-decoration-none">{{ $product->category->name }}</a></p>

                @if ($product->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/'. $product->image) }}" alt="" class="img-fluid mt-3">
                    </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $product->category->name }}" class="card-img-top" alt="{{ $product->category->name }}" class="img-fluid">
                @endif
                

                <article class="my-3 fs-5">
                    {!! $product->body !!}
                </article>
            
                {{-- <a href="/products" class="d-block mt-3 text-decoration-none">Back to Products</a> --}}
            </div>
        </div>
    </div>
@endsection