@extends('dashboard.layouts.main')

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
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('info'))
    <div class="alert alert-info mt-3 alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Pick user by email address </h1>
        </div>
        <div class="">
            <form action="{{ route('assign.user.create') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    @error('email')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="roles">Pick Roles</label>
                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Assign</button>
            </form>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>The Roles</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                        <td><a href="{{ route('assign.user.edit', $user) }}" class="btn btn-primary btn-sm">Sync</a></td>
                    </tr>
                @endforeach
          </tbody>
        </table>
    </div>
@endsection