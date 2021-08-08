<div class="sidebar" data-color="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text logo-normal text-center">
                <span class="font-weight-bold">WILP</span>
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('user.list') }}">
                    <i class="nc-icon nc-layers-3"></i>
                    <p>All Users</p>
                </a>
            </li>
			<li class="nav-item ">
                <a class="nav-link" href="{{ route('post.list') }}">
                    <i class="nc-icon nc-layers-3"></i>
                    <p>All Posts</p>
                </a>
            </li>
            {{-- Manage User --}}
            @can('manage-users')
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="nc-icon nc-settings-gear-64"></i>
                        <p>Manage User</p>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
