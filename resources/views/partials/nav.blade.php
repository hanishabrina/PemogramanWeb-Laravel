<nav class="nav" aria-label="Main Navigation">
    <a href="{{ route('home') }}"
       class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

    @auth
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('articles.index') }}"
           class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">Artikel</a>

        <div class="right">
            <span style="background: var(--yellow-soft); color: var(--text); padding: 0.3rem 0.7rem; border-radius: 999px; font-size: 0.85rem; font-weight: 600; border: 1px solid #fde047;">
                Hi, {{ auth()->user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="right">
            <a href="{{ route('login') }}"
               class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            <a href="{{ route('register') }}"
               class="{{ request()->routeIs('register') ? 'active' : '' }}"
               style="background: var(--yellow-soft); border: 1px solid #fde047;">Register</a>
        </div>
    @endguest
</nav>