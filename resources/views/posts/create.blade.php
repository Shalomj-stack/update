@extends('layouts.app') @section('content')
<div class="container">
    <form action="/p" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1>Add New Post</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label"
                        >Post caption</label
                    >

                    <input 
                    id="caption" 
                    type="text" 
                    class="form-control @error('caption') is-invalid @enderror" 
                    name="caption"
                    value="{{ old("caption") }}" 
                    autocomplete="caption"
                    autofocus /> 

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2">
                <label for="image">Post image</label>
                <input
                    type="file"
                    class="form-control-file"
                    name="image"
                    id="image"
                />

                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <button type="submit" class="btn btn-primary">
                    Add New Post
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
