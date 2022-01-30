@extends('index')

@section('title', 'Account')

@section('content')
    <div class="container welcome-page countries">
        <div class="row list justify-content-md-center gy-4">
            <div class="col-sm-12 col-md-6 blips">
                <div class="border" style="border: 0px !important;">
                    <div class="row account text-start">
                        <div class="col-12">
                            <h2>Login</h2>
                            <p>Sign into {{ _env("APP_NAME", "Leaf MVC")  }}</p>
                        </div>
                        <div class="col-12">
                            <form action="/auth/login" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" placeholder="username" value="{{ $username ?? '' }}">
                                    <p>{{ $errors['username'] ?? $errors['auth'] ?? null }}</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="password" value="{{ $password ?? '' }}">
                                    <p>{{ $errors['password'] ?? null }}</p>
                                </div>
                                <button class="btn btn-primary">Login</button>
                                <a class="btn btn-secondary" href="/auth/register">Create account</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection