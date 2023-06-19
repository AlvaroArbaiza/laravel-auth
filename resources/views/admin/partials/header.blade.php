<nav class="navbar navbar-expand-md border-bottom border-secondary mx-5 py-3 d-block">
    <div class="d-flex justify-content-between">

        {{-- TITLE - name --}}
        <a class="d-flex align-items-center link-light link-offset-2" href="{{ url('/') }}">
            <h3 class="text-uppercase">alvaro arbaiza</h3>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- NAV --}}
        <div class="collapse navbar-collapse flex-grow-0 pe-2" id="navbarSupportedContent">

            <!-- LISTS -->
            <ul class="navbar-nav ml-auto fs-4">

                {{-- home --}}
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="{{url('/') }}">{{ __('Home') }}</a>
                </li>

                {{-- work --}}
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="{{url('admin/work') }}">{{ __('Work') }}</a>
                </li>

                {{-- about --}}
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="#">{{ __('About') }}</a>
                </li>

                <!-- DROPDOWN - Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown" data-bs-theme="dark">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white-50" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                        <a class="dropdown-item" href="{{ url('admin/profile') }}">{{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>