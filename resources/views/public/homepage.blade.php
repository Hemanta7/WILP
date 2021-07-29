@extends('layouts.master')
<x-navigation />
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                {{-- Main Content / Used to Post and Display Campaigns --}}
                <main class="col col-xl-8 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    @auth
                        <form action="{{ route('post.campaign') }}" method="post" class="w-100" enctype="multipart/form-data">
                            @csrf
                            <div class="box shadow-sm border rounded bg-white mb-3 user-share-post">
                                <ul class="nav nav-justified border-bottom user-line-tab" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="cursor: default" id="home-tab" data-toggle="tab"
                                            href="#home" role="tab" aria-controls="home" aria-selected="true"><i
                                                class="feather-edit"></i> post a
                                            campaign</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="p-3 w-100">
                                            <div class="row">
                                                @if (Session::has('message'))
                                                    <div class="col-12">
                                                        <div class="alert alert-success alert-dismissible fade show"
                                                            role="alert">
                                                            <strong>Success!</strong> {{ Session::get('message') }}
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select placeholder="Category"
                                                            class="form-control form-control-lg shadow-none" name="category">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-block btn-lg btn-success"
                                                            data-toggle="modal" data-target="#addcategory">Add Category</button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="text" name="topic"
                                                            class="form-control shadow-none form-control-lg"
                                                            placeholder="Title">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea placeholder="Description..."
                                                            class="form-control form-control-lg shadow-none" rows="5"
                                                            name="description"></textarea>
                                                    </div>
                                                </div>
                                                {{-- Add Media --}}
                                                <div class="col-12">
                                                    <p>
                                                        <a class="btn btn-primary shadow-none" data-toggle="collapse"
                                                            href="#multiCollapseExample1" role="button" aria-expanded="false"
                                                            aria-controls="multiCollapseExample1">Add Media <i
                                                                class="feather-chevron-down"></i></a>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="image">Add Image</label>
                                                                        <input type="file" name="image"
                                                                            class="form-control shadow-none form-control-lg">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="video">Add Video</label>
                                                                        <input type="file" name="video"
                                                                            class="form-control shadow-none form-control-lg">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="audio">Add Audio</label>
                                                                        <input type="file" name="audio"
                                                                            class="form-control shadow-none form-control-lg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top p-3 d-flex align-items-center">
                                    {{-- <div class="mr-auto">
                                    <a href="#" class="text-link small mr-4"><i class="feather-image"></i> Add
                                        Image</a>
                                    <a href="#" class="text-link small mr-4"><i class="feather-video"></i> Add
                                        Video</a>
                                    <a href="#" class="text-link small"><i class="feather-headphones"></i> Add
                                        Audio</a>
                                </div> --}}
                                    <div class="d-flex justify-content-end w-100">
                                        <button type="button" class="btn btn-primary btn-lg">Create Post</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endauth
                    {{-- Posts Here --}}
                    <div class="box shadow-sm border rounded bg-white mb-3 user-post">
                        <div class="p-3 d-flex align-items-center border-bottom user-post-header">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p5.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Stephen Vincent Strange</div>
                                <div class="small text-gray-500">Avengers Inc.</div>
                            </div>
                            <span class="ml-auto small">3 hours</span>
                        </div>
                        <div class="p-3 border-bottom user-post-body">
                            <p class="mb-0">Tmpo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
                        </div>
                        <div class="p-3 border-bottom user-post-footer">
                            <a href="#" class="mr-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                            <a href="#" class="mr-3 text-secondary"><i class="feather-message-square"></i> 8</a>
                            <a href="#" class="mr-3 text-secondary"><i class="feather-share-2"></i> 2</a>
                        </div>
                        <div class="p-3">
                            <button type="button" class="btn btn-outline-primary btn-sm mr-1">Awesome!!</button>
                            <button type="button" class="btn btn-light btn-sm mr-1">😍</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm mr-1">Whats it about?</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm mr-1">Oooo Great Wow</button>
                        </div>
                    </div>
                    <div class="box mb-3 shadow-sm border rounded bg-white user-post">
                        <div class="p-3 d-flex align-items-center border-bottom user-post-header">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/p6.png" alt="">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Collin Weiland</div>
                                <div class="small text-gray-500">Web Developer @Envato</div>
                            </div>
                            <span class="ml-auto small">3 hours</span>
                        </div>
                        <div class="p-3 border-bottom user-post-body">
                            <p>Lorem ipsum dolor sit amet, consectetur 😍😎 adipisicing elit, sed do eiusmod tempo
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco <a href="#">laboris consequat.</a></p>
                            <img src="img/post1.png" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="p-3 border-bottom user-post-footer">
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
                                <div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span></div>
                                <div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro
                                    quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
                            </div>
                        </div>
                        <div class="p-3">
                            <textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none"
                                rows="1"></textarea>
                        </div>
                    </div>
                </main>
                {{-- Quick Profile View --}}
                @auth
                    <aside class="col col-xl-4 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                            <div class="py-4 px-3 border-bottom">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name .'+'. auth()->user()->last_name }}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                                <h5 class="font-weight-bold text-dark mb-1 mt-4">
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h5>
                                <p class="mb-0 text-muted">{{ auth()->user()->occupation }}</p>
                            </div>
                            <div class="d-flex">
                                <div class="col-12 border-right p-3">
                                    <p class="mb-2 text-black-50 small">Your Total Campaigns</p>
                                    <h6 class="font-weight-bold text-dark mb-0">324</h6>
                                </div>
                            </div>
                            <div class="overflow-hidden border-top">
                                <a class="font-weight-bold p-3 d-block" href="{{ route('customer.profile') }}"> View my
                                    profile
                                </a>
                            </div>
                        </div>
                    </aside>
                @endauth
            </div>
            <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('add.category') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Category Description</label>
                                    <textarea class="form-control" name="description" placeholder="Description"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
