<div class="col-12 col-xl-auto">
    <div class="flq-sidebar flq-sidebar-lg">
        <div class="flq-account-navbar">
            <nav>
                <ul class="nav nav-dots flex-column gy-3">
                    <li class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                        <a href="{{route('profile')}}" class="nav-link">
                            <span class="nav-link-name">Profile</span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="account-favorites.html" class="nav-link">--}}
{{--                            <span class="nav-link-name">Recent Watched</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @role('Contributor')
                    <li class="nav-item {{ request()->routeIs('my_movies') ? 'active' : '' }}">
                        <a href="{{route('my_movies')}}" class="nav-link">
                            <span class="nav-link-name">My Movies</span>
                        </a>
                    </li>
                    @endrole
                    <li class="nav-item {{ request()->routeIs('account_edit') ? 'active' : '' }}">
                        <a href="{{route('account_edit')}}" class="nav-link">
                            <span class="nav-link-name">Profile Edit</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('change_password') ? 'active' : '' }}">
                        <a href="{{route('change_password')}}" class="nav-link">
                            <span class="nav-link-name">Change Password</span>
                        </a>
                    </li>
                    @if(\App\Models\Setting::first()->stripe)
                    <li class="nav-item {{ request()->routeIs('payment_method') ? 'active' : '' }}">
                        <a href="{{route('payment_method')}}" class="nav-link">
                            <span class="nav-link-name">Payment Method</span>
                        </a>
                    </li>
                    @endif

                    @php

                        $user = Illuminate\Support\Facades\Auth::user();

                    @endphp

                    @if($user->referral)

                        <li class="nav-item">

                            <a href="{{route('dashboard')}}" class="nav-link">

                                <span class="nav-link-name">Dashboard</span>

                            </a>

                        </li>

                    @endif
                    <li class="nav-item">
                        <a href="javascript:void(0)" onclick="$('#logout-form').submit();" class="nav-link">
                            <span class="nav-link-name">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>