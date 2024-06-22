<nav id="navbar">
    <ul>
        <li class="brand">e-Receptes</li>
        <li>
            <a href="{{ Auth::check() ? route('dashboard') : route('home') }}">
                Sākums
            </a>
        </li>
        @auth
            @if(Auth::user()->role !== 'admin')
                <li class="dropdown">
                    <a href="#" class="dropbtn">Receptes</a>
                    <div class="dropdown-content">
                        <a href="{{ route('recipes.mine') }}">Manas receptes</a>
                        <a href="{{ route('recipes.public') }}">Publiskās receptes</a>
                        <a href="{{ route('recipes.liked') }}">Patīk receptes</a>
                    </div>
                </li>
                <li><a href="{{ route('contact') }}">Kontakti</a></li>
        @endif
            
        <li><a href="{{ route('info') }}">Par</a></li>
        @if(Auth::user()->role === 'admin')
            <li><a href="{{ route('admin.messages') }}">Ziņas</a></li>
        @endif
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
