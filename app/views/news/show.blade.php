@extends('index')

@section('title', $article['title'])

@section('content')
    <div class="container countries">
        <div class="row">
            <div class="col-12 article">
                <h6 class="back"><a href="/{{ strtolower($article['country']) }}"><i class="fas fa-long-arrow-alt-left"></i> Back</a></h6>
                <h1>{{ $article['title'] }}</h1>
                <h3 class="no-bold">{{ html_entity_decode($article['description'], ENT_QUOTES) }}</h3>
                <h6 class="date">{{ html_entity_decode($article['created_at']->format('Y-m-d'), ENT_QUOTES) }}</h6>
            </div>
            <div class="col-12 processed-html">{!! $article['processed_html'] !!}</div>
        </div>
    </div>
@endsection