<div class="container footer text-center">
    @if (auth()->status())
        <a href="/user">Logged in as: {{$user['username']}}</a>
    @else
        <a href="/auth/login">Login</a>
    @endif
</div>