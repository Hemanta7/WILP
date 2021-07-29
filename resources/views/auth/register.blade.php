@extends('layouts.master')
@section('content')
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-md-4 mx-auto">
                    <div class="user-login py-4">
                        <div class="text-center mb-4">
                            <a href="{{ url('/') }}"><img src="img/fav.png" alt=""></a>
                            <h5 class="font-weight-bold mt-3">Join Stop Bullying</h5>
                            <p class="text-muted">Easy Connection, Easy Business.</p>
                        </div>
                        <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1">
                                    First name &nbsp;
                                    @error('first_name')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    Last name &nbsp;
                                    @error('last_name')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-user position-absolute"></i>
                                    <input type="text" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mb-1">
                                    Occupation &nbsp;
                                    @error('occupation')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-home position-absolute"></i>
                                    <input type="text" name="occupation"
                                        class="form-control @error('occupation') is-invalid @enderror"
                                        value="{{ old('occupation') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    Email &nbsp;
                                    @error('email')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
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
                                    Country &nbsp;
                                    @error('country')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-map-pin position-absolute"></i>
                                    <input type="text" name="country"
                                        class="form-control @error('country') is-invalid @enderror"
                                        value="{{ old('country') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    State &nbsp;
                                    @error('state')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-map position-absolute"></i>
                                    <input type="text" name="state"
                                        class="form-control @error('state') is-invalid @enderror"
                                        value="{{ old('state') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">
                                    City &nbsp;
                                    @error('city')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-navigation position-absolute"></i>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="mb-1">
                                    Profile Image &nbsp;
                                    @error('profile_image')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-image position-absolute"></i>
                                    <input type="file" name="profile_image"
                                        class="form-control @error('profile_image') is-invalid @enderror"
                                        value="{{ old('profile_image') }}">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="mb-1">
                                    Password (6 or more characters) &nbsp;
                                    @error('password')
                                        <span class="small text-danger">{{ " - " . $message }}</span>
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
                                        <span class="small text-danger">{{ " - " . $message }}</span>
                                    @enderror
                                </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label class="mb-1">You agree to the Stop Bullying <a href="javascript:void(0)"
                                        style="cursor: default;">User Agreement</a>, <a href="javascript:void(0)"
                                        style="cursor: default;">Privacy Policy</a>, and <a href="javascript:void(0)"
                                        style="cursor: default;">Cookie
                                        Policy</a>.</label>
                            </div>
                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Agree & Join </button>
                            <div class="py-3 d-flex align-item-center">
                                <a href="forgot-password.html">Forgot password?</a>
                                <span class="ml-auto"> Already on Stop Bullying? <a class="font-weight-bold"
                                        href="{{ url('/login') }}">Sign in</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
