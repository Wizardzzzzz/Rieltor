<nav>
    <div class="nav-wrapper purple darken-4">
        <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html"><i class="material-icons">search</i></a></li>
            <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
            <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
            <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
            @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a></li>
                    @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>
                    @endauth
            @endif
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        </ul>
    </div>
</nav>
