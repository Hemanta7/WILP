@extends('admin.layouts.master')
@section('breadcrumb', 'Dashboard')
@section('content')
<div class="content ing-scrollbar-style">
    <div class="container-fluid">
        <div class="row">
            {{-- Users --}}
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-single-02 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category text-uppercase pb-1">Total Users</p>
                                    <h4 class="card-title">{{ $users->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            {{-- Posts --}}
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-single-copy-04 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category text-uppercase pb-1">Total Posts</p>
                                    <h4 class="card-title">{{ $posts->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
