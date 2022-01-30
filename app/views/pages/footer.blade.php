<div class="container footer text-center">
    @if (auth()->status())
        @if ($user["admin_level"] >= 1)
            <a href="/dashboard">Logged in as: {{$user['username']}}</a>
        @else
            <a href="/user">Logged in as: {{$user['username']}}</a>
        @endif
    @else
        <a href="/auth/login">Login</a>
    @endif
</div>