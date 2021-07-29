@extends('layouts.master')
<x-navigation />
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <aside class="col col-xl-4 order-xl-1 col-lg-12 order-lg-1 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                        <div class="py-4 px-3 border-bottom">
                            <img src="img/p13.png" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">Steve Rogers</h5>
                            <p class="mb-0 text-muted">Avengers Inc.</p>
                        </div>
                        <div class="d-flex">
                            <div class="col-12 border-right p-3">
                                <p class="mb-2 text-black-50 small">Your Total Campaigns</p>
                                <h6 class="font-weight-bold text-dark mb-0">358</h6>
                            </div>
                        </div>
                        <div class="overflow-hidden border-top">
                            <a class="font-weight-bold p-3 d-block" href="sign-in.html"> Log Out </a>
                        </div>
                    </div>
                    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
                        <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold text-dark">Stop Bullying Solutions</h6>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary pl-4 pr-4"> POST A Campaigns </button>
                        </div>
                    </div>
                </aside>
                <main class="col col-xl-8 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Posted Campaigns</h6>
                        </div>
                        <div class="box-body p-3 border-bottom">
                            <div class="d-flex align-items-top job-item-header pb-2">
                                <div class="mr-2">
                                    <a href="">
                                        <h6 class="font-weight-bold text-dark mb-0">Hydra Invasion</h6>
                                    </a>
                                    <div class="small text-gray-500">Oct 2017 - Present (4 year 7 month) </div>
                                </div>
                            </div>
                            <p class="mb-0">I am groot I am groot I am groot I am groot I am groot I am groot I am groot I
                                am groot I am groot I am groot I am groot I am groot!</p>
                        </div>
                        <div class="box-body p-3 border-bottom">
                            <div class="d-flex align-items-top job-item-header pb-2">
                                <div class="mr-2">
                                    <a href="">
                                        <h6 class="font-weight-bold text-dark mb-0">Ultron Project</h6>
                                    </a>
                                    <div class="small text-gray-500">Aug 2019 - Present (2 year 2 month) </div>
                                </div>
                            </div>
                            <p class="mb-0">I am groot I am groot I am groot I am groot I am groot I am groot I am groot I
                                am groot I am groot I am groot I am groot I am groot ?</p>
                        </div>
                        <div class="overflow-hidden border-top text-center">
                            {{-- <a class="font-weight-bold p-3 d-block" href="company-campaigns.html"> VIEW ALL CAMPAIGNS </a> --}}
                        </div>
                    </div>                   
                </main>                
            </div>
        </div>
    </div>
@endsection
