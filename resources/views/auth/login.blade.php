@extends('layouts.master')
@section('content')
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">
                <div class="col-md-4 mx-auto">
                    <div class="user-login py-4">
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}"><img src="img/fav.png" alt=""></a>
                            <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                            <p class="text-muted">Don't miss your next opportunity. Sign in to stay updated on your
                                professional world.</p>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success mt-3" role="alert">

                                <div class="mb-1"><i
                                        class="feather-check-circle pr-2"></i><strong>{{ session('status') }}</strong>
                                </div>
                            </div>
                        @endif
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger mb-3 pb-0">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="mb-1">Email</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Password</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Sign in </button>
                            <div class="py-3 d-flex align-item-center">
                                <a href="{{ url('/forgot-password') }}">Forgot password?</a>
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
