@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Permission</h1>
        </div>
        <div class="">
            <form action="{{ route('permissions.edit', $permission) }}" method="post">
                @csrf
                @method('PUT')
                @include('dashboard.spatie.permissions.partials.form-control')
                <a class="text-danger mx-3" href="{{ route('permissions.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection