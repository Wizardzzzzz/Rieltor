<nav class="header-bg">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img class="icon" src="{{asset("Company.ico")}}">
                <span class="fs-4">MyRieltor</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item active">
                    <a class="nav-link text-dark hover" href="{{route('advertisements.index')}}">Оголошення</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link text-dark hover" href="#">Обрані</a>
                </li>

                @if(Auth::user()->isAdmin())
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Адмін панель
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li> <a class="dropdown-item" href="{{route('advertisements.create')}}">Добавити оголошення</a></li>
                                <li> <a class="dropdown-item" href="{{route('advertisements.action')}}">Дія з оголошенням</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.users')}}">Користувачі</a></li>
                                <li><a class="dropdown-item" href="{{route('advertisements.archieve')}}">Архів</a></li>
                            </ul>
                        </div>
                @endif
                @endauth
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a class="nav-link text-dark hover" href="{{ url('/') }}">Про нас</a></li>
                        <li class="nav-item ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="nav-link text-dark hover"  href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Вихід</a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark hover" href="{{ route('register') }}">Реєстрація</a></li>
                        <li class="nav-item"><a class="nav-link text-dark hover" href="{{ route('login') }}">Вхід</a></li>
                    @endauth
                @endif

            </ul>
        </header>
    </div>
</nav>
