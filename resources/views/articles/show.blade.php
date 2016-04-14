@extends('app')

@section('content')
    <h1 class="page-header">{{$article->title}}</h1>
    <p>{{$article->body}}</p>

    @unless($article->tags->isEmpty())
        <h5>Tags: </h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    @endunless
@endsection