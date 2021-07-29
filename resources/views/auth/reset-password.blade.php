@extends('layouts.master')
@section('content')
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">
                <div class="col-md-4 mx-auto">
                    <div class="user-login py-4">
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}"><img src="img/fav.png" alt=""></a>
                            <h5 class="font-weight-bold mt-3">First, let's find your account</h5>
                            <p class="text-muted">Please enter your email</p>
                        </div>
                        <form action="{{ url('/reset-password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <div class="form-group">
                                <label class="mb-1">
                                    Email &nbsp;
                                    @error('email')
                                        <span class="small text-danger">{{ ' - ' . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-globe position-absolute"></i>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    Password (6 or more characters) &nbsp;
                                    @error('password')
                                        <span class="small text-danger">{{ ' - ' . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" name="password"
                                        class="form-control @error('first_name') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    Re-enter Password
                                    @error('password_confirmation')
                                        <span class="small text-danger">{{ ' - ' . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Reset Password
                            </button>                            
                            <div class="py-2 d-flex align-item-center">
                                <a href="{{ url('/login') }}">Sign In</a>
                                <span class="ml-auto"> New to Stop Bullying? <a class="font-weight-bold"
                                        href="{{ url('/register') }}">Join now</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
