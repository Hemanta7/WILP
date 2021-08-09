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
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name . '+' . Auth::user()->last_name }}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">{{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}</h5>
                            <p class="mb-0 text-muted">{{ Auth::user()->occupation }}</p>
                        </div>
                        <div class="d-flex">
                            <div class="col-12 border-right p-3">
                                <p class="mb-2 text-black-50 small">Your Total Campaigns</p>
                                <h6 class="font-weight-bold text-dark mb-0">{{ $posts->count() }}</h6>
                            </div>
                        </div>
                        <div class="overflow-hidden border-top">
                            <a class="font-weight-bold p-3 d-block" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
                        <img src="img/job1.png" class="img-fluid" alt="Responsive image">
                        <div class="p-3 border-bottom">
                            <h6 class="font-weight-bold text-dark">Stop Bullying Solutions</h6>
                        </div>
                        <div class="p-3">
                            <a href="{{ url('/') }}" class="btn btn-outline-primary pl-4 pr-4"> POST A Campaigns </a>
                        </div>
                    </div>
                </aside>
                <main class="col col-xl-8 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">Posted Campaigns</h6>
                        </div>
                        @if ($posts->count() == 0)
                            <div
                                class="p-3 d-flex flex-column justify-content-center align-items-center border-bottom user-post-header">
                                <h5 class="mt-4 mb-4">Sorry we couldn't find any post</h5>
                                <img src="{{ asset('img/not-found.png') }}" alt="post-not-found" width="100px">
                            </div>
                        @endif
                        @foreach ($posts as $post)
                            <div class="box mb-3 shadow-sm border rounded bg-white user-post">
                                <div class="p-3 d-flex align-items-center border-bottom user-post-header">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle"
                                            src="https://ui-avatars.com/api/?name={{ $post->user->first_name . '+' . $post->user->last_name }}"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">
                                            {{ $post->user->first_name . ' ' . $post->user->last_name }}</div>
                                        <div class="small text-gray-500">{{ $post->user->occupation }}</div>
                                    </div>
                                    <span
                                        class="ml-auto small">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                </div>
                                <div class="p-3 border-bottom user-post-body">
                                    <h6 class="font-weight-bold text-dark mb-2">{{ $post->topic }} <span
                                            class="font-weight-light small badge badge-secondary">Approval Status -
                                            {{ $post->approval_status }}</span></h6>
                                    <p class="mb-2">{{ $post->description }}</p>
                                    <p><span class="badge badge-primary">
                                            {{ $post->category->title }}</span></p>
                                    @if (optional($post->image)->image)
                                        <div class="img-wrapper mt-4">
                                            <img src="{{ asset('img/posts/' . optional($post->image)->image) }}"
                                                class="img-fluid" alt="Responsive image">
                                        </div>
                                    @endif
                                    @if (optional($post->video)->video)
                                        <hr>
                                        <div class="img-wrapper mt-4">
                                            <video width="100%" controls>
                                                <source src="{{ asset('img/posts/' . optional($post->video)->video) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endif
                                    @if (optional($post->audio)->audio)
                                        <hr>
                                        <div class="img-wrapper mt-4">
                                            <audio width="100%" controls>
                                                <source src="{{ asset('img/posts/' . optional($post->audio)->audio) }}"
                                                    type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                    @endif
                                </div>
                                {{-- <div class="p-3 border-bottom user-post-footer">
                                <a href="#" class="mr-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                                <a href="#" class="mr-3 text-secondary"><i class="feather-message-square"></i> 8</a>
                                <a href="#" class="mr-3 text-secondary"><i class="feather-share-2"></i> 2</a>
                            </div>
                            <div class="p-3 d-flex align-items-top border-bottom user-post-comment">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p7.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span>
                                    </div>
                                    <div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro
                                        quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
                                </div>
                            </div>
                            <div class="p-3">
                                <textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none"
                                    rows="1"></textarea>
                            </div> --}}
                            </div>
                        @endforeach
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
