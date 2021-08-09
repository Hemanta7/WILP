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
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name . '+' . Auth::user()->last_name }}"
                                class="img-fluid mt-2 rounded-circle" alt="Responsive image">
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
                    @if (Session::has('message'))
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
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
                                    @can('canEdit', $post)
                                        <div class="actions d-flex align-items-center mb-3">
                                            <button type="button" data-toggle="modal"
                                                data-target="#exampleModal{{ $post->id }}"
                                                class="btn btn-secondary mr-2">Edit Post</button>
                                            <form method="POST" action="{{ route('delete.campaign', $post->id) }}"
                                                style="display: inline-block" class="m-0 p-0">
                                                @csrf
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger">Delete Post</button>
                                            </form>
                                        </div>
                                        <hr>
                                    @endcan
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
    @foreach ($posts as $post)
        <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('edit.campaign', $post) }}" method="post" class="w-100"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="box shadow-sm border rounded bg-white mb-3 user-share-post">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
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
                                                <div class="col-12">
                                                    @error('category')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <select placeholder="Category"
                                                            class="form-control form-control-lg shadow-none"
                                                            name="category">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $post->category->id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-4">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-block btn-lg btn-success"
                                                        data-toggle="modal" data-target="#addcategory">Add Category</button>
                                                </div>
                                            </div> --}}
                                                <div class="col-12">
                                                    @error('topic')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <input type="text" name="topic"
                                                            class="form-control shadow-none form-control-lg"
                                                            value="{{ $post->topic }}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <textarea placeholder="Description..."
                                                            class="form-control form-control-lg shadow-none" rows="5"
                                                            name="description">{{ $post->description }}</textarea>
                                                    </div>
                                                </div>
                                                {{-- Add Media --}}
                                                <div class="col-12">
                                                    <p>
                                                        <a class="btn btn-primary shadow-none" data-toggle="collapse"
                                                            href="#multiCollapseExample1" role="button"
                                                            aria-expanded="false" aria-controls="multiCollapseExample1">Add
                                                            Media <i class="feather-chevron-down"></i></a>
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
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary  btn-lg" data-dismiss="modal">Close</button>
                            {{-- <div class="d-flex align-items-center justify-content-end w-100"> --}}
                            @can('isActive')
                                <button type="submit" class="btn btn-primary btn-lg">Create Post</button>
                            @else
                                <p class="p-0 m-0 mr-3 text-danger">Your account is not active. Please contact
                                    administrator for further operations</p>
                                <button type="button" style="cursor: not-allowed" class="disabled btn btn-primary btn-lg">Create
                                    Post</button>
                            @endcan
                            {{-- </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
