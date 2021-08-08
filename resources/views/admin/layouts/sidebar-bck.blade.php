@if (Auth::user()->role == 'student')
                {{-- Dashboard --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('student.dashboard') }}">
                        <i class="nc-icon nc-layers-3"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- Notices --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('student.notice') }}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>Notices</p>
                    </a>
                </li>
            @endif
            @can('manage-contents')
                {{-- Dashboard --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="nc-icon nc-layers-3"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- Pages --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('page.index') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>Pages</p>
                    </a>
                </li>
                {{-- Notice --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('notice.index') }}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>Notice</p>
                    </a>
                </li>
                {{-- Event --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('post.index') }}">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>News & Event</p>
                    </a>
                </li>
                {{-- Routine --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('routine.index') }}">
                        <i class="nc-icon nc-album-2"></i>
                        <p>Routine</p>
                    </a>
                </li>
                {{-- Manage User --}}
                @can('manage-users')
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('manage.user') }}">
                            <i class="nc-icon nc-settings-gear-64"></i>
                            <p>Manage User</p>
                        </a>
                    </li>
                @endcan
                {{-- Profile --}}
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Profile</p>
                    </a>
                </li>
            @endcan