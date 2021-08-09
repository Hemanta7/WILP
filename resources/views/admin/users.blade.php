@extends('admin.layouts.master')
@section('breadcrumb', 'View Users')
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
                @if ($users->count() == 0)
                    <div class="ing-not-found">
                        <div class="ing-icon-container">
                            <i class="ing-warning-icon"></i>
                        </div>
                        <h3 class="text-center">Users not found.</h3>
                        <p class="text-center">You can start adding users by clicking "ADD USER" button above.</p>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Occupation</th>
                                            <th>Location</th>
                                            <th>Role</th>
                                            <th class="disabled-sorting">Make Admin</th>
                                            <th class="disabled-sorting">Status</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->occupation }}</td>
                                                <td>{{ ucfirst($user->country) }}, {{ ucfirst($user->state) }},
                                                    {{ ucfirst($user->city) }}</td>
                                                <td>
                                                    <label class="form-check-label pl-0">
                                                        {{ $user->role }}
                                                    </label>
                                                </td>
                                                <td>
                                                    <form action="{{ route('manage.role', $user->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-check">
                                                            <label class="form-check-label pl-0">
                                                                <input class="form-check-input" name="role"
                                                                    value="{{ $user->role == 'superadmin' ? 'admin' : 'superadmin' }}"
                                                                    type="checkbox" onclick="this.form.submit()"
                                                                    {{ $user->role == 'admin' ? 'checked' : '' }}>
                                                                <span class="form-check-sign"></span>
                                                                Make Admin
                                                            </label>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <label class="form-check-label pl-0">
                                                        {{ ucfirst($user->status) }}
                                                    </label>
                                                </td>
                                                <td class="text-right">
                                                    <ul style="list-style: none;" class="m-0 p-0">
                                                        <li class="mb-2">
                                                            <form
                                                                action="{{ route('manage.user.status', $user->id) }}"
                                                                method="POST" class="d-inline p-0 m-0">
                                                                {{ csrf_field() }}
                                                                @if ($user->status == 'active')
                                                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                                                    <button class="m-0 btn btn-secondary btn-wd"
                                                                        type="submit"><i
                                                                            class="fas fa-times-circle"></i>
                                                                        Deactivate</button>
                                                                @else
                                                                    <button class="m-0 btn btn-success btn-wd"
                                                                        type="submit"><i
                                                                            class="fas fa-check-circle"></i>
                                                                        Activate</button>
                                                                @endif
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('delete.user', $user->id) }}"
                                                                method="POST" class="d-inline p-0 m-0">
                                                                {{ csrf_field() }}
                                                                <a href="" onclick="return confirm('Are you sure?')">
                                                                    <button class="m-0 btn btn-danger btn-wd"
                                                                        type="submit"><i class="far fa-trash-alt"></i>
                                                                        Delete</button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
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
