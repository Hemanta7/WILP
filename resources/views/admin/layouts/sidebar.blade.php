<div class="sidebar" data-color="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text logo-normal text-center">
                <span class="font-weight-bold">WILP</span>
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="nc-icon nc-layers-3"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('post.list') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Manage Posts</p>
                </a>
            </li>
            {{-- Manage User --}}
            @can('isSuperadmin')
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('user.list') }}">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
