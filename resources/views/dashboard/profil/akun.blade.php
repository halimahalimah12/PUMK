@extends('dashboard.layouts.main')

@section('container')
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Setting Akun</h5>

        @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
        

         <form action="/akun-update" method="POST">
            @method("put")
            @csrf
                <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email) }}">
                         @error("email")
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                      </div> 
                    </div>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control  @error('currentPassword') is-invalid @enderror" id="currentPassword">
                        @error("currentPassword")
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                         @error("password")
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                        @error("password_confirmation")
                            <div class="text-red-500 mt-2 text-sm"> {{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
        </div>
    </div>
@endsection