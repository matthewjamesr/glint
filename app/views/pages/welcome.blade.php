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
    <div class="container welcome-page countries">
        <div class="row list justify-content-md-center gy-4">
            <div class="col-12 blips">
                <div class="border" style="border: 0px !important;">
                    <div class="row news front-page">
                        @foreach ($news as $news)
                            @if ($news['type'] == 'video')
                                <a href="{{ $news['video_url'] }}" class="col-sm-6 col-lg-4" style="margin-top: 0px;" target="_blank">
                                    <div class="video text-start">
                                        <i class="fab fa-youtube float-start"></i>
                                        <h4> {{ html_entity_decode($news['title'], ENT_QUOTES) }}</h4>
                                        <h5>{{ html_entity_decode($news['description'], ENT_QUOTES) }}</h5>
                                        <span class="float-start">Watch now <i class="fas fa-long-arrow-alt-right"></i></span>
                                    </div>
                                </a>
                            @elseif ($news['type'] == 'article')
                                <a href="/{{ strtolower($news['country']) }}/{{ str_replace(' ', '_', $news['title']) }}" class="col-sm-6 col-lg-4" style="margin-top: 0px;">
                                    <div class="article text-start">
                                        <i class="far fa-newspaper float-start"></i>
                                        <h4>{{ html_entity_decode($news['title'], ENT_QUOTES) }}</h4>
                                        <h5>{{ html_entity_decode($news['description'], ENT_QUOTES) }}</h5>
                                        <span>Read more <i class="fas fa-long-arrow-alt-right"></i></span>
                                    </div>
                                </a>
                                @elseif ($news['type'] == 'blip')
                                <a href="/{{ strtolower($news['country']) }}/{{ str_replace(' ', '_', $news['title']) }}" class="col-sm-6 col-lg-4" style="margin-top: 0px;">
                                    <div class="article text-start">
                                        <h4>{{ news['country'] }}</h4>
                                        <h5>{{ news['processed_html'] }}</h5>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection