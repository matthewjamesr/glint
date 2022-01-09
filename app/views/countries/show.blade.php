@extends('index')

@section('title', $country['country'])

@section('content')
    <div class="container countries">
        <div class="row justify-content-md-center gy-4">
            <div class="col s12 hero no-border">
                @if ($country["country"] === "China")
                    <img class="flag" src="{{ PublicPath('flags/china_flag.png') }}"></img>
                @elseif ($country["country"] === "DPRK")
                    <img class="flag" src="{{ PublicPath('flags/dprk_flag.png') }}"></img>
                @elseif ($country["country"] === "Russia")
                    <img class="flag" src="{{ PublicPath('flags/russia_flag.png') }}"></img>
                @endif
                <div class="content">
                    <h1 class="text-end" style="margin-right: 25%;">{{ $country['country'] }}</h1>
                </div>
            </div>
        </div>
        <div class="row list justify-content-md-center gy-4">
            <div class="col-xs-12 col-md-6 blips">
                <div class="border">
                    <h1>Blips</h1>
                    @if (count($blips) > 0)
                    @else
                        <h6>Nothing recent</h6>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-md-6 blips">
                <div class="border">
                    <h1>Videos</h1>
                    @if (count($videos) > 0)
                    @else
                        <h6>Nothing recent</h6>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 blips">
                <div class="border">
                    <h1>Articles</h1>
                    <div class="row news" id="articles">
                        @if (count($articles) > 0)
                            @foreach ($articles as $article)
                                <a href="/{{ $article['country'] }}/{{ str_replace(' ', '_', $article['title']) }}" style="margin-top: 0px;">
                                    <div class="col-12 article text-start">
                                        <h1>{{ $article['title'] }}</h1>
                                        <h3>{{ $article['description'] }}</h3>
                                        <span>Read more <i class="fas fa-long-arrow-alt-right"></i></span>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <h6>Nothing recent</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection