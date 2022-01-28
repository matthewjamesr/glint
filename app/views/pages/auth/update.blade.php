@extends('index')

@section('title', 'Account')

@section('content')
    <div class="container welcome-page countries">
        <div class="row list justify-content-md-center gy-4">
            <div class="col-12 blips">
                <div class="border" style="border: 0px !important;">
                    <div class="row account text-start">
                        <div class="col-12">
                            <h2>Update User</h2>
                            <p>Edit your {{ _env("APP_NAME", "Leaf MVC") }} account</p>
                        </div>
                        <div class="col-12">
                            <form action="/user/update" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" placeholder="username" value="{{ $username ?? '' }}">
                                    <p>{{ $errors['username'] ?? $errors['auth'] ?? null }}</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="email" value="{{ $email ?? '' }}">
                                    <p>{{ $errors['email'] ?? $errors['auth'] ?? null }}</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="fullname" placeholder="name" value="{{ $fullname ?? '' }}">
                                    <p>{{ $errors['fullname'] ?? null }}</p>
                                </div>
                                <button class="btn btn-primary">Update Account</button>
                                <a class="btn btn-secondary" href="/user">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection