@extends('pages.admin.main')

@section('title', 'Account')

@section('content')
<div class="container welcome-page countries">
    <div class="row list justify-content-md-center gy-4">
        <div class="col-12 blips">
            <div class="border" style="border: 0px !important;">
                <div class="row account text-start">
                    <div class="col-12">
                        <h2 style="font-weight: 900;">Account</h2>
                        <p>Review your profile information</p>
                        <ul>
                            @foreach ($keys as $key)
                                <li>
                                    <b>{{ $key }}</b>: {{ $user[$key] }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-secondary" href="/user/update">Edit your account</a>
                        <a class="btn btn-primary" href="{{ AuthConfig('GUARD_LOGOUT') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection