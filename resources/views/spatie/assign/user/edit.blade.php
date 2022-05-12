@extends('layouts.back')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select permissions"
            });
        });
    </script>
@endpush

@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">Sync Roles for <b>{{ $user->name }}</b></div>
        <div class="card-body">
            <form action="{{ route('assign.user.edit', $user) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="user">User</label>
                    <input type="text" name="email" id="user" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label for="roles">Pick Roles</label>
                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                        @foreach($roles as $role)
                            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Sync</button>
            </form>
        </div>
    </div>
@endsection