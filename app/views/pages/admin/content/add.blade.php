@extends('pages.admin.main')

@section('title', 'Add content')

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
                        <h2 class="float-start" style="font-weight: 900;">Draft {{ $type }}</h2>
                        <p style="clear: both; line-break: break-word;">This content has not been published</p>
                    </div>
                </div>
                <div class="row account text-start">
                    <form id="editorForm" action="/news" method="POST">
                        <input type="hidden" name="type" value="{{ $type }}" />
                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-3">
                                <label for="country" class="form-label is-valid">Country</label>
                                <select class="form-select" aria-label="Select a country" id="country" name="country">
                                    <option selected>Choose country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country['country'] }}">{{ $country['country'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($type == "article" || $type == "blip")
                                <div class="mb-3 col-sm-12 col-md-9">
                                    <label for="title" class="form-label is-valid">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
                                    <div id="titleHelp" class="form-text">Max-length: 60 characters</div>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                    <div id="descriptionHelp" class="form-text">Max-length: 120 characters</div>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="markdown" class="form-label">Content</label>
                                    <div id="editor"></div>
                                    <input type="hidden" name="markdown" id="markdown">
                                </div>
                            @else
                                <div class="mb-3 col-sm-12 col-md-6">
                                    <label for="video_url" class="form-label is-valid">Video URL</label>
                                    <input type="text" class="form-control" id="video_url" name="video_url" aria-describedby="videoHelp" autocomplete="off">
                                    <div id="videoHelp" class="form-text">Paste URL to video</div>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection