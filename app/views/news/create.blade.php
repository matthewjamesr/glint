@extends('index')

@section('title', 'Add content')

@section('content')
    <div class="container countries">
        <div class="row">
            <div class="col-12">
                <form id="editorForm" action="/news" method="POST">
                    <div class="row">
                        <div class="mb-3 col-sm-12 col-md-3">
                            <label for="type" class="form-label is-valid">News type</label>
                            <select class="form-select" aria-label="Select news type" id="type" name="type">
                                <option selected>Choose type</option>
                                <option value="blip">Blip</option>
                                <option value="video">Video</option>
                                <option value="article">Article</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-3" id="form-country-input">
                            <label for="country" class="form-label is-valid">Country</label>
                            <select class="form-select" aria-label="Select a country" id="country" name="country">
                                <option selected>Choose country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country['country'] }}">{{ $country['country'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6" id="form-title-input">
                            <label for="title" class="form-label is-valid">Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
                            <div id="titleHelp" class="form-text">Max-length: 60 characters</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12 col-md-6" id="form-description-input">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                            <div id="descriptionHelp" class="form-text">Max-length: 120 characters</div>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6" id="form-video-url-input">
                            <label for="video_url" class="form-label is-valid">Video URL</label>
                            <input type="text" class="form-control" id="video_url" name="video_url" aria-describedby="videoHelp" autocomplete="off">
                            <div id="videoHelp" class="form-text">Paste URL to video</div>
                        </div>
                    </div>
                    <div class="mb-3 col-12" id="form-editor-input">
                        <label for="markdown" class="form-label">Content</label>
                        <div id="editor"></div>
                        <input type="hidden" name="markdown" id="markdown">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection