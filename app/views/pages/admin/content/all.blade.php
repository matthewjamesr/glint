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
                        <h2 class="float-end d-none d-sm-none d-md-block"><buttun class="add-content"><i class="fas fa-plus"></i></button></h2>
                        <div class="btn-group d-block d-md-none float-end" style="margin-bottom: 10px;">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Add content
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                <li><a class="dropdown-item" href="/dashboard/content/new?type=article"><i class="far fa-newspaper float-start"></i> Article</a></li>
                                <li><a class="dropdown-item" href="/dashboard/content/new?type=video"><i class="fab fa-youtube float-start"></i> Video</a></li>
                                <li><a class="dropdown-item" href="/dashboard/content/new?type=blip"><i class="fas fa-bullhorn float-start"></i> Blip</a></li>
                            </ul>
                        </div>
                        <div class="add-content-type d-none d-sm-none d-md-block">
                            <a href="/dashboard/content/new?type=article">
                                <div>
                                    <h6><i class="far fa-newspaper float-start"></i> Article</h6>
                                </div>
                            </a>
                            <a href="/dashboard/content/new?type=video">
                                <div>
                                    <h6><i class="fab fa-youtube float-start"></i> Video</h6>
                                </div>
                            </a>
                            <a href="/dashboard/content/new?type=blip">
                                <div>
                                    <h6><i class="fas fa-bullhorn float-start"></i> Blip</h6>
                                </div>
                            </a>
                        </div>
                        <p style="clear: both; line-break: break-word;">Review all draft and published content</p>
                    </div>
                </div>
                <div class="row account text-start">
                    @foreach ($content as $content)
                        <div class="col-12 content-item">
                            <a class="float-start" href="/dashboard/content/{{ $content->id }}/edit">
                                <h3>{{ $content->title }}</h3>
                                <p>{{ $content["description"] }}</p>
                                <ul class="metadata">
                                    <li><i class="fas fa-user"></i> {{ App\Models\User::where(['id' => $content["author"]])->pluck("fullname")->first() }} </li>
                                    <li><i class="fas fa-calendar-day"></i> {{ html_entity_decode($content->created_at->format('Y-m-d'), ENT_QUOTES) }}</li>
                                    <li><i class="fas fa-filter"></i> {{ $content->type }}</li>
                                </ul>
                            </a>
                            @if ($content->published)
                                <a class="float-end" href="/dashboard/content/toggle/{{ $content->id }}"><h3><i class="fas fa-book-reader float-end published" data-bs-toggle="tooltip" data-bs-placement="left" title="Published"></i></h3></a>
                            @else
                                <a class="float-end" href="/dashboard/content/toggle/{{ $content->id }}"><h3><i class="fas fa-book-reader float-end draft" data-bs-toggle="tooltip" data-bs-placement="left" title="Draft"></i></h3></a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection