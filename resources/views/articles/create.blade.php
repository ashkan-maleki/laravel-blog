@extends('app')

@section('content')
    <h1 class="page-header">Write a New Article</h1>
    {{--@foreach($articles as $article)--}}
    {{--<h3>--}}
    {{--<a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>--}}
    {{--</h3>--}}
    {{--<p>{{ $article->body }}</p>--}}

    {{----}}
    {{--@endforeach--}}
    <form class="form-horizontal" action="{{action('ArticlesController@store')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                       value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="col-sm-2 control-label">Body</label>

            <div class="col-sm-10">
                <textarea class="form-control" id="body" name="body" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="published_at" class="col-sm-2 control-label">Published On</label>

            <div class="col-sm-10">
                <input type="datetime" class="form-control" id="published_at"
                       name="published_at" placeholder="Published On" value="{{Carbon\Carbon::now()}}">
            </div>
        </div>
        <div class="form-group">
            <label for="tags[]" class="col-sm-2 control-label">Tags</label>

            <div class="col-sm-10">
                <select class="form-control" name="tags[]" id="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        {{$selected = false}}
                        @if(!is_null(old('tags')))
                            {{$selected = is_integer(array_search($tag->id, old('tags')))}}
                        @endif
                        <option value="{{$tag->id}}" {{$selected ? 'selected' : ''}}>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{--@foreach($old_tags as $tag)--}}
        {{--{{$tag}}--}}
        {{--@endforeach--}}
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>


    @include('errors.form')
@endsection

@section('footer')
    <script type="text/javascript">
        $('select').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>
@endsection