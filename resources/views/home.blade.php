<x-layouts.guest>
    <p>Home</p>
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest
    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="Logout">
        </form>
    @endauth
</x-layouts.guest>
