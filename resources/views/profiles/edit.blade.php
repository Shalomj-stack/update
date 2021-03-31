@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ \Session::get('success') }}
                    </div>
                @elseif(\Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ \Session::get('failed') }}
                    </div>
                @endif

            </div>
        </div>
        <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-8 offset-2">
                    <h1>Add New Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}" autocomplete="title" autofocus />

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>

                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description') }}" autocomplete="description" autofocus />

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">url</label>

                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                            value="{{ old('url') }}" autocomplete="url" autofocus />

                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <label for="image">Profile image</label>
                    <input type="file" class="form-control-file" name="image" id="image" />

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
