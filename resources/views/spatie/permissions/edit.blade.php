@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header"><b>Edit Permission</b></div>
        <div class="card-body">
            <form action="{{ route('permissions.edit', $permission) }}" method="post">
                @csrf
                @method('PUT')
                @include('spatie.permissions.partials.form-control')
            </form>
        </div>
    </div>
@endsection