@extends('pages.admin.main')

@section('title', 'Content')

@section('content')
<div class="container welcome-page countries">
    <div class="row list justify-content-md-center gy-4">
        <div class="col-sm-12 col-md-4 blips">
            <div class="border" style="border: 0px !important;">
                <div class="row account text-start">
                    <div class="col-12 stats">
                        <h3 class="text-center">Statistics</h3>
                        <div class="row gy-4" style="margin-top: 0px;">
                            @if ($articleCount == 0 && $videoCount == 0 && $blipCount == 0)
                                <div class="col-sm-12 text-center">
                                    <h4><i class="fas fa-info-circle"></i> No content</h4>
                                </div>
                            @endif
                            @if ($articleCount != 0)
                                <div class="col-sm-12 col-md-6 text-center">
                                    <h4><i class="far fa-newspaper"></i> {{ $articleCount }}</h4>
                                </div>
                            @endif
                            @if ($videoCount != 0)
                                <div class="col-sm-12 col-md-6 text-center">
                                    <h4><i class="fab fa-youtube"></i> {{ $videoCount }}</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 blips">
            <div class="border" style="border: 0px !important;">
                <div class="row account text-start">
                    <div class="col-12">
                        <h2 class="float-start" style="font-weight: 900;">All content</h2>
                        <h2 class="float-end"><a class="add-content" href="/dashboard/content/new"><i class="fas fa-plus"></i></a></h2>
                        <p style="clear: both;">Review all draft and published content</p>
                    </div>
                </div>
                <div class="row account text-start">
                    @foreach ($content as $content)
                        <div class="col-12 content-item">
                            <h3>{{ $content["title"] }}</h3>
                            <p>{{ $content["description"] }}</p>
                            <ul class="metadata">
                                <li><i class="fas fa-user"></i> {{ App\Models\User::where(['id' => $content["author"]])->pluck("fullname")->first() }} </li>
                                <li><i class="fas fa-calendar-day"></i> {{ html_entity_decode($content->created_at->format('Y-m-d'), ENT_QUOTES) }}</li>
                            </ul>
                            <!--<span class="view d-none d-sm-none d-md-block float-end">View details</span>-->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection