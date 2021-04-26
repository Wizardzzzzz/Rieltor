<nav class="header-bg">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img class="icon" src="{{asset("Company.ico")}}">
                <span class="fs-4">MyRieltor</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-dark" href="#">Features</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">Login</a></li>
                    @endauth
                @endif
                @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </header>
    </div>
</nav>
