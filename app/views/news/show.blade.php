@extends('index')

@section('title', $article['title'])

@section('content')
    <div class="container countries">
        <div class="row">
            <div class="col-12 article">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">GLINT</a></li>
                        <li class="breadcrumb-item"><a href="/{{ strtolower($article['country']) }}">{{ strtoupper($article['country']) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ARTICLE</li>
                    </ol>
                </nav>
                <h1>{{ $article['title'] }}</h1>
                <h3 class="no-bold">{{ html_entity_decode($article['description'], ENT_QUOTES) }}</h3>
                <h6 class="date">{{ html_entity_decode($article['created_at']->format('Y-m-d'), ENT_QUOTES) }}</h6>
            </div>
            <div class="col-12 processed-html">{!! $article['processed_html'] !!}</div>
        </div>
        <div class="row share">
            <div class="col-12 text-center">
                <h4>Get the word out</h4>
                <p>Let your tribe know what's happening</p>
            </div>
            <div class="col-12">
                <ul class="row options">
                    <li class="col-4"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://itsglint.com/{{ $article['country'] }}/{{ str_replace(' ', '_', $article['title']) }}"><i class="fab fa-facebook"></i></a></li>
                    <li class="col-4"><a target="_blank" href="https://twitter.com/intent/tweet?text={{ strtoupper($article['country']) }}:%20{{ str_replace(' ', '%20', $article['description'])}}%0D%0Dhttps://itsglint.com/{{ $article['country'] }}/{{ str_replace(' ', '_', $article['title']) }}%0D%0D%23{{ $article['country'] }} %40glintnews"><i class="fab fa-twitter"></i></a></li>
                    <li class="col-4"><a target="_blank" href="https://www.reddit.com/submit?url=https://itsglint.com/{{ $article['country'] }}/{{ str_replace(' ', '_', $article['title']) }}&title={{ $article['title'] }}"><i class="fab fa-reddit"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection