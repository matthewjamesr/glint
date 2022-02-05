@extends('pages.admin.main')

@section('title', 'Edit content')

@section('content')
<div class="container welcome-page countries">
    <div class="row list justify-content-md-center gy-4">
        <div class="col-sm-12 col-md-4 blips">
            <div class="border" style="border: 0px !important;">
                <div class="row account text-start">
                    <div class="col-12 stats">
                        <h3 class="text-left">Meta</h3>
                        <p>Search-engine settings and more</p>
                        <div class="row gy-4" style="margin-top: 0px;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 blips">
            <div class="border" style="border: 0px !important;">
                <div class="row account text-start">
                    <div class="col-12">
                        <a class="float-start" id="add-content-back" href="/dashboard/content">
                            <h2><i class="fas fa-long-arrow-alt-left"></i></h2>
                        </a>
                        <div class="float-start">
                            @if ($content->published)
                            <h2 class="float-start" style="font-weight: 900;">Published {{ $content->type }}</h2>
                            @else
                                <h2 class="float-start" style="font-weight: 900;">Draft {{ $content->type }}</h2>
                            @endif
                            <p style="clear: both; line-break: break-word;">This content has not been published</p>
                        </div>
                    </div>
                </div>
                <div class="row account text-start">
                    <form id="editorForm" action="/dashboard/content/{{ $content->id }}/update" method="POST">
                        <input type="hidden" name="type" id="type" value="{{ $content->type }}" />
                        <input type="hidden" name="command" id="command" />
                        <div class="row">
                            @if (isset($alert))
                                <div class="col-12">@include('components.alert', ['alert' => $alert, 'alertType' => $alertType])</div>
                            @endif
                            <div class="mb-3 col-sm-12 col-md-3">
                                <label for="country" class="form-label is-valid">Country</label>
                                <select class="form-select" aria-label="Select a country" id="country" name="country"">
                                    <option>Choose country</option>
                                    @foreach ($countries as $country)
                                        @if ($content->country == $country->country)
                                            <option value="{{ $country->country }}" selected>{{ $country->country }}</option>
                                        @else
                                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @if ($content->type == "article" || $content->type == "blip")
                                <div class="mb-3 col-sm-12 col-md-9">
                                    <label for="title" class="form-label is-valid">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $content->title ?? '' }}" aria-describedby="titleHelp">
                                    <div id="titleHelp" class="form-text">Max-length: 60 characters</div>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $content->description ?? '' }}">
                                    <div id="descriptionHelp" class="form-text">Max-length: 120 characters</div>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="markdown" class="form-label">Content</label>
                                    <div id="editor"></div>
                                    <input type="hidden" name="markdown" id="markdown" value="{{ $content->markdown ?? '' }}">
                                </div>
                            @else
                                <div class="mb-3 col-sm-12 col-md-6">
                                    <label for="video_url" class="form-label is-valid">Video URL</label>
                                    <input type="text" class="form-control" id="video_url" name="video_url" aria-describedby="videoHelp" autocomplete="off" value="{{ $content->video_url ?? '' }}">
                                    <div id="videoHelp" class="form-text">Paste URL to video</div>
                                    <div class="float-start" id="editor" style="opacity: 0; max-height: 0px !important;"></div>
                                    <input type="hidden" name="markdown" id="markdown" value="{{ $content->markdown ?? '' }}">
                                </div>
                            @endif
                        </div>
                    </form>
                    <div class="editor-form-actions">
                        <a class="btn btn-danger float-start" href="/dashboard/content/{{ $content->id }}/delete">Delete</a>
                        <button id="publish" class="btn btn-primary float-end">Publish</button>
                        <button id="save" class="btn btn-secondary float-end">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection