<nav class="header-bg">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img class="icon" src="{{asset("Company.ico")}}">
                <span class="fs-4">MyRieltor</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="{{route('advertisements.index')}}">Оголошення</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-dark" href="#">Обрані</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Адмін панель
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('advertisements.create')}}">Добавити оголошення</a>
                        <a class="dropdown-item" href="">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ url('/') }}">Про нас</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="nav-link text-dark"  href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Вихід</a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('register') }}">Реєстрація</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">Вхід</a></li>
                    @endauth
                @endif

            </ul>
        </header>
    </div>
</nav>
