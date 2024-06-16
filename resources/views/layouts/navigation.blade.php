<nav id="navbar">
    <ul>
        <li class="brand">e-Receptes</li>
        <li>
            <a href="{{ Auth::check() ? route('dashboard') : route('home') }}">
                Sākums
            </a>
        </li>
        @auth
            <li class="dropdown">
                <a href="#" class="dropbtn">Receptes</a>
                <div class="dropdown-content">
                    <a href="#">Manas receptes</a>
                    <a href="#">Publiskās receptes</a>
                    <a href="#">Patīk receptes</a>
                </div>
            </li>
            <li><a href="{{ route('info') }}">Par</a></li>
            <li><a href="{{ route('contact') }}">Kontakti</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Iziet</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('info') }}">Par</a></li>
            <li><a href="{{ route('contact') }}">Kontakti</a></li>
        @endauth
    </ul>
</nav>