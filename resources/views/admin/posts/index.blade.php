@extends('layouts.app')

@section('content')



    @if($user->posts->isEmpty())
        <div class="container">
            <h4>No tienes ningun post</h4>
        </div>
    @else

    <div class="container">
        <ul>
            @foreach($user->posts as $post)
            <h2>{{$post->title}}</h2>
                <div class="row">
                    <img src="/uploads/images/{{$post->path}}" alt="">
                </div>
                <p><b>{{$post->text}}</b></p>
            @endforeach
        </ul>
    </div>
    @endif

@endsection