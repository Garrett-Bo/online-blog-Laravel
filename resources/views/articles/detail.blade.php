@extends('layouts.app')
@section('content')

<div class="container" style="max-width: 800px">

    @if(session("info"))
    <div class="alert alert-info">
        {{session("info")}}
    </div>
    @endif

    <div class="card mb-2 border-primary">
        <div class="card-body">
            <h2>{{$article->title}}</h2>
            <div>
                <b class="text-success">
                    {{$article->user->name}}
                </b>,
                <small class="text-muted">
                    <b>Category: </b>
                    <span class="text-success">
                        {{$article->category->name}}
                    </span>
                    {{$article->created_at}}
                </small>
            </div>
            <div class="mb-2" style="font-size: 1.3em">
                {{$article->body}}
            </div>

            @can('delete-article',$article)
            <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-outline-danger">
            Delete
            </a>
            @endcan
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item active">
            <b>Comment:({{count($article->comments)}})</b>
        </li>
        @foreach ($article->comments as $comment)
        <li class="list-group-item">
            @can('delete-comment',$comment)
            <a href="{{ url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
            @endcan

            <b class="text-success">
                {{$comment->user->name}}
            </b>
            
            {{$comment->content}}
        </li>  
        @endforeach
    </ul>

    <form action="{{ url("/comments/add")}}" method="post">
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
    <textarea name="content" id="" class="form-control my-2" cols="30" rows="3"></textarea>
    <button class="btn btn-outline-secondary">Add Comment</button>
    </form>
</div>
@endsection