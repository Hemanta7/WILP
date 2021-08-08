@extends('admin.layouts.master')
@section('breadcrumb', 'View Event')
@section('content')
<div class="content ing-scrollbar-style">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session('message'))
                    <div class="alert alert-success">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            <b> Success - </b> {{ Session('message') }}
                        </span>
                    </div>
                @endif
                @if ($posts->count() == 0)
                    <div class="ing-not-found">
                        <div class="ing-icon-container">
                            <i class="ing-warning-icon"></i>
                        </div>
                        <h3 class="text-center">Posts not found.</h3>
                        <p class="text-center">You can start adding post by clicking "ADD Event" button above.</p>
                    </div>
                @else
                    @if (Session('s-message'))
                        <div class="alert alert-success">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                                <b> Success - </b> {{ Session('s-message') }}
                            </span>
                        </div>
                    @endif
                    <div class="card data-tables">
                        <div
                            class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                            <div class="fresh-datatables">
                                <table id="" class="display table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Topic</th>
                                            <th>Description</th>
                                            <th>Media</th>
                                            <th>Author</th>
                                            <th>Published</th>
                                            <th class="disabled-sorting">Status</th>
                                            {{-- <th class="disabled-sorting text-center">Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->topic }}</td>
                                                <td>{{ \App\Helper\AppHelper::instance()->trim_word($post->description, '50') }}
                                                </td>
                                                <td>
                                                    <ul style="list-style: none;" class="m-0 p-0">
                                                        <li class="d-flex flex-column">
                                                            @if (optional($post->image)->image)
                                                                <div class="img-wrapper mt-1">
                                                                    <img src="{{ asset('img/posts/' . optional($post->image)->image) }}"
                                                                        class="img-fluid" alt="Responsive image"
                                                                        width="350px">
                                                                </div>
                                                            @endif
                                                            @if (optional($post->video)->video)
                                                                <hr>
                                                                <div class="img-wrapper mt-1">
                                                                    <video width="350px" controls>
                                                                        <source
                                                                            src="{{ asset('img/posts/' . optional($post->video)->video) }}"
                                                                            type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                </div>
                                                            @endif
                                                            @if (optional($post->audio)->audio)
                                                                <hr>
                                                                <div class="img-wrapper mt-1">
                                                                    <audio width="100%" controls>
                                                                        <source
                                                                            src="{{ asset('img/posts/' . optional($post->audio)->audio) }}"
                                                                            type="audio/mpeg">
                                                                        Your browser does not support the audio element.
                                                                    </audio>
                                                                </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('change.post', $post->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-check">
                                                            <label class="form-check-label pl-0">
                                                                <input class="form-check-input" name="status"
                                                                    type="checkbox" onChange="this.form.submit()"
                                                                    {{ $post->approval_status }} {{ $post->approval_status == 'approved' ? 'checked' : '' }}>
                                                                <span class="form-check-sign"></span>
                                                                {{ $post->approval_status }}
                                                            </label>
                                                        </div>
                                                    </form>
                                                </td>
                                                {{-- <td class="text-center">
                                                    <ul style="list-style: none;" class="m-0 p-0">
                                                        <li class="d-flex flex-column">
                                                            <a href="#" target="_blank">
                                                                <button class="btn btn-success btn-wd" type="submit"><i
                                                                        class="fa fa-eye"></i>
                                                                    VIEW</button>
                                                            </a>
                                                            <!-- <input type="hidden" name="_method" value="EDIT"> -->
                                                            <a href="#">
                                                                <button class="btn btn-primary btn-wd" type="submit"><i
                                                                        class="fa fa-edit"></i>
                                                                    EDIT</button>
                                                            </a>
                                                            <form action="#" method="POST"
                                                                class="d-flex flex-column p-0 m-0">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="" onclick="return confirm('Are you sure?')">
                                                                    <button class="m-0 btn btn-danger btn-wd"
                                                                        type="submit"><i class="far fa-trash-alt"></i>
                                                                        Delete</button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
