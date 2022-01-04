@extends('index')

@section('title', 'Welcome')

@section('content')
<div class="container countries">
        <div class="row justify-content-md-center gy-4">
            <div class="col s12 hero">
                <h1 class="text-center">We have intel on the biggest threats</h1>
                <p>It's the <b>baddies</b>. Daily updates on the biggest threats to global security.</p>
                <div class="request">
                    <a class="btn btn-dark" href="/countries">Get briefed</a>
                </div>
            </div>
        </div>
    </div>
@endsection