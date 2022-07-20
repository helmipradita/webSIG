@extends('dashboard.layouts.main')

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit User</h1>
        </div>
        <div class="">
            <form action="/dashboard/alluser/update/{{ $alluser->id }}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $alluser->name }}">
                    @error('name')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ?? $alluser->username }}">
                    @error('username')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') ?? $alluser->email }}">
                    @error('email')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') ?? $alluser->password }}">
                    @error('password')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                <a class="text-danger mx-3" href="{{ route('alluser.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection