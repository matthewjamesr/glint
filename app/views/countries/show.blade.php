@extends('index')

@section('title', $country['country'])

@section('content')
<div class="container countries">
        <div class="row justify-content-md-center gy-4">
            @if ($country["country"] === "China")
                <div class="col s12 hero" style="background: url('{{ PublicPath('flags/china_flag.png') }}')">
            @elseif ($country["country"] === "DPRK")
                <div class="col s12 hero" style="background: url('{{ PublicPath('flags/dprk_flag.png') }}')">
            @elseif ($country["country"] === "Russia")
                <div class="col s12 hero" style="background: url('{{ PublicPath('flags/russia_flag.png') }}')">
            @endif
                <h1 class="text-center">We have intel on the biggest threats</h1>
                <p>It's the <b>baddies</b>. Daily updates on the biggest threats to global security.</p>
                <div class="request">
                    <a class="btn btn-dark" href="/countries">Get briefed</a>
                </div>
            </div>
            <div col="col s12">
                {{ $news }}
            </div>
        </div>
    </div>
@endsection