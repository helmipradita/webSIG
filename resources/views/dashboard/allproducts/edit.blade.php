@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Produk by Admin</h1>
    </div>
        
    <form action="/dashboard/allproducts/{{ $product->slug }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $product->title) }}" required  readonly>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"  readonly value="{{ old('slug', $product->slug) }}" required>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Category</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                @if (old('category_id', $product->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                    
                @endforeach
                </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Product Image</label>
            <input type="hidden" name="oldImage" value="{{ $product->image }}">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-6 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-6">
            @endif
            <input class="form-control @error('image') is-invalid @enderror"  readonly value="{{ old('image') }}" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="body">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $product->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Update Product</button>
    </form>


    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/products/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection