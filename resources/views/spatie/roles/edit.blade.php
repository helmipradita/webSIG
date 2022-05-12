@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header"><b>Edit Role</b></div>
        <div class="card-body">
            <form action="{{ route('roles.edit', $role) }}" method="post">
                @csrf
                @method('PUT')
                @include('spatie.roles.partials.form-control')
                <a class="text-danger mx-3" href="{{ route('roles.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection