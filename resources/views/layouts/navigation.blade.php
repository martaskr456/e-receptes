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
                    <a href="{{ route('recipes.mine') }}">Manas receptes</a>
                    <a href="{{ route('recipes.public') }}">Publiskās receptes</a>
                    <a href="{{ route('recipes.liked') }}">Patīk receptes</a>
                </div>
            </li>
            <li><a href="{{ route('info') }}">Par</a></li>
            <li><a href="{{ route('contact') }}">Kontakti</a></li>
            <li class="dropdown user-dropdown">
                <a href="#" class="dropbtn">{{ Auth::user()->name }}</a>
                <div class="dropdown-content">
                    <a href="{{ route('profile.show') }}">Profils</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-button">Iziet</button>
                    </form>
                </div>
            </li>
        @else
            <li><a href="{{ route('info') }}">Par</a></li>
            <li><a href="{{ route('contact') }}">Kontakti</a></li>
        @endauth
    </ul>
</nav>

<style>
    .logout-button {
        background-color: transparent;
        border: 2px solid #FF8C00;
        color: #FF8C00;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .logout-button:hover {
        background-color: #FF8C00;
        color: #fff;
    }
</style>
