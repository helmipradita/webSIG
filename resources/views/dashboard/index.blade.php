@extends('dashboard.layouts.main')

@section('content')
  <style>
    .feather-30{
        width: 30px;
        height: 30px;
    }
    .tool-30{
        width: 30px;
        height: 30px;
    }
  </style>
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">&#128075; Halo, {{ auth()->user()->name }} </h1>
    </div>
    <h3>Statistik Data <span data-feather="activity" class="feather-30">a</span></h3><hr>

    <div class="row">
        <div class="col-md-2 mb-3">
          <div class="card text-dark bg-light mb-3" >
            <a href="/dashboard/products" class="text-decoration-none text-black">  
              <div class="card-body">
                  <h3><span data-feather="file-text" class="feather-30"></span> {{ $products }}</h3>
                  <p class="text-uppercase fw-bold">Product</p>
                </div>
              </a>
            </div>
        </div>
        <div class="col-md-2 mb-3">
          <div class="card text-dark bg-light mb-3" >
            <a href="/dashboard/categories" class="text-decoration-none text-black">  
              <div class="card-body">
                <h3><span data-feather="list" class="feather-30"></span> {{ $categories }}</h3>
                <p class="text-uppercase fw-bold">Category</p>
              </div>
            </a>
            </div>
        </div>
        <div class="col-md-2 mb-3">
          <div class="card text-dark bg-light mb-3" >
            <a href="/dashboard/kecamatan" class="text-decoration-none text-black">  
              <div class="card-body">
                <h3><span data-feather="list" class="feather-30"></span> {{ $kecamatan }}</h3>
                <p class="text-uppercase fw-bold">kecamatan</p>
              </div>
            </a>
            </div>
        </div>
        <div class="col-md-2 mb-3">
          <div class="card text-dark bg-light mb-3" >
            <a href="/dashboard/tempat" class="text-decoration-none text-black">  
              <div class="card-body">
                <h3><span data-feather="map-pin" class="feather-30"></span> {{ $tempat }}</h3>
                <p class="text-uppercase fw-bold">tempat</p>
              </div>
            </a>
            </div>
        </div>
        <div class="col-md-2 mb-3">
          <div class="card text-dark bg-light mb-3" >
            <a href="/dashboard/users" class="text-decoration-none text-black">  
              <div class="card-body">
                <h3><span data-feather="users" class="feather-30"></span> {{ $users }}</h3>
                <p class="text-uppercase fw-bold">users</p>
              </div>
            </a>
            </div>
        </div>
    </div>

    <br><br>
    <h3>Setting Akun <span data-feather="tool" class="tool-30">a</span></h3><hr>

    <div class="row justify-content">
      <div class="col-md-6 card bg-light">
        <h5 class="row justify-content-center mt-1">Ganti Password</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('change.password') }}">
              @csrf 

                @foreach ($errors->all() as $error)
                  <p class="text-danger">{{ $error }}</p>
                @endforeach 

              <div class="mb-3 row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                  <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                  </div>
              </div>

              <div class="mb-3 row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                  <div class="col-md-6">
                      <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                  </div>
              </div>

              <div class="mb-3 row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                  <div class="col-md-6">
                      <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          Update Password
                      </button>
                  </div>
              </div>
            </form>
        </div>
      </div>
  </div><br><br>

@endsection