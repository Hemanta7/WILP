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
                        <form action="{{ url('/forgot-password') }}" method="POST">
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
                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Request Password Reset
                            </button>
                            @if (session('status'))
                                <div class="alert alert-success mt-3" role="alert">

                                    <div class="text-center mb-1"><i class="feather-check-circle pr-2"></i><strong>Request
                                            Successfull</strong></div>
                                    <div class="text-center">{{ session('status') }}</div>
                                </div>
                            @endif
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
