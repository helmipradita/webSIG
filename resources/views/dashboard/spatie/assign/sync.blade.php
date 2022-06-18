@extends('dashboard.layouts.main')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select permissions",
            });
        });
    </script>
@endpush

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Assign Permission </h1>
        </div>
        <div class="">
            <form action="{{ route('assign.edit', $role) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="role">Role Name</label>
                    <select name="role" id="role" class="form-control">
                        <option disabled selected>Choose a role!</option>
                        @foreach($roles as $item)
                            <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="permissions">Permissions</label>
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                        @foreach($permissions as $permission)
                            <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Sync</button>
                <a class="text-danger mx-3" href="{{ route('assign.create') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection