@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Kategori</h1>
        </div>
        <div class="">
            <form action="/dashboard/kategori/update/{{ $kategori->id }}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label" for="name">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $kategori->name }}">
                    @error('name')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') ?? $kategori->slug }}">
                    @error('slug')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                <a class="text-danger mx-3" href="{{ route('kategori.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection