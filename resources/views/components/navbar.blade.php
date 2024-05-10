<header>
    {{-- @auth --}}
    {{-- @if (Auth::user()->role == 'admin') --}}
    <div class="shadow-sm navbar">
        <a class="logo" href="/" style="text-decoration:none; cursor: pointer">
            <img src="logo.png" alt="ExistAuto">
        </a>
        <nav>
            <ul>
              <li><a href="/mobil/beli">Buy Car</a></li>
              <li><a href="/mobil/jual">Sell Car</a></li>
              <li><a href="/forum">Forums</a></li>
              <li><a href="/">FAQ</a></li>
            </ul>
        </nav>
        <div class="search rounded border">
            <input class="filtered" type="text" placeholder="Cari mobil...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        @if (Auth::check())
            <ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
                            alt="User Avatar" style="width: 40px; height: 40px; border-radius: 50%;">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink"
                        style="width:100%">
                        <a class="dropdown-item rounded" href="{{ url('/profile') }}"
                            style="display: block; width:100%">Profile</a>

                        {{-- <hr class="dropdown-divider"> --}}


                        <a class="dropdown-item rounded" href="{{ route('logout') }}" style="display: block; width:100%"
                            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
                </li>
            </ul>
        @else
            <div class="user">
                <a class="login-btn" data-bs-toggle="modal" data-bs-target="#authModal"
                    style="text-decoration: none; cursor: pointer;">Login/Sign Up</a>
            </div>
        @endif
    </div>

    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authModalLabel">Login/Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs nav -->
                    <ul class="nav nav-tabs justify-content-center mb-4" id="authTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                                type="button" role="tab" aria-controls="register"
                                aria-selected="false">Register</button>
                        </li>
                    </ul>
                    <!-- Tabs content -->
                    <div class="tab-content" id="authTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel"
                            aria-labelledby="login-tab">
                            @include('auth.login')
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            @include('auth.register')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('auth.login')
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('auth.register')
                </div>
            </div>
        </div>
    </div>
</header>
