@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mr-md-5 ml-md-5 pr-md-3 pl-md-3 pb-5">
        <div class="col-3 col-md-2 pl-md-5 align-self-start">
            <img
                src="https://scontent-los2-1.cdninstagram.com/v/t51.2885-19/s150x150/97566921_2973768799380412_5562195854791540736_n.jpg?tp=1&amp;_nc_ht=scontent-los2-1.cdninstagram.com&amp;_nc_ohc=RHMOf7tUvVoAX9aXmwC&amp;ccb=7-4&amp;oh=9074b40b7c425644d85a291fe6412040&amp;oe=60833667"
                class="rounded-circle w-100"
            />
        </div>
        <div class="col col-md-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <h2 class="pr-3 justify-item-start">{{$user->username}}</h2>
                <a href="/p/create">Add new post</a>
            </div>
            <div class="d-flex pt-3">
                <div class="pr-5"><strong>345</strong> posts</div>
                <div class="pr-5"><strong>975k</strong> followers</div>
                <div class="pr-5"><strong>124</strong> following</div>
            </div>
            <div class="pt-3"><b></b></div>
            <div>
        
            </div>
            <div><a href="#"></a></div>
        </div>
    </div>
    <main class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 col-md-3 mb-3">
            <img class="w-100" src="/storage/{{ $post->image }}" />
        </div>
        @endforeach
    </main>
</div>

@endsection
