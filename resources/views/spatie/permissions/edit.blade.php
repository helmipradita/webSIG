@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header"><b>Edit Permission</b></div>
        <div class="card-body">
            <form action="{{ route('permissions.edit', $permission) }}" method="post">
                @csrf
                @method('PUT')
                @include('spatie.permissions.partials.form-control')
                <a class="text-danger mx-3" href="{{ route('permissions.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection