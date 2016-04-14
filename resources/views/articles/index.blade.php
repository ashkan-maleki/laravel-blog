@extends('app')

@section('content')
    <h1 class="page-header">Articles</h1>
    @foreach($articles as $article)
        <h3>
            <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
        </h3>
        <p>{{ $article->body }}</p>
    @endforeach
@endsection