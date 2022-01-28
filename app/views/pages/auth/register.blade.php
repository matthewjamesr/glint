@extends('index')

@section('title', 'Account')

@section('content')
    <div class="container welcome-page countries">
        <div class="row list justify-content-md-center gy-4">
            <div class="col-12 blips">
                <div class="border" style="border: 0px !important;">
                    <div class="row account text-start">
                        <div class="col-12">
                            <h2>Login</h2>
                            <p>Sign into {{ _env("APP_NAME", "Leaf MVC")  }}</p>
                        </div>
                        <div class="col-12">
                            <form action="/auth/register" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" placeholder="username" value="{{ $username ?? '' }}">
                                    <p>{{ $errors['username'] ?? $errors['auth'] ?? null }}</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="email" value="{{ $email ?? '' }}">
                                    <p>{{ $errors['email'] ?? $errors['auth'] ?? null }}</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="password" value="{{ $password ?? '' }}">
                                    <p>{{ $errors['password'] ?? null }}</p>
                                </div>
                                <button class="btn btn-primary">Create account</button>
                                <a class="btn btn-secondary" href="{{ AuthConfig('GUARD_LOGIN') }}">Login instead</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection