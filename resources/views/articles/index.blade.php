@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

        {{$articles->links()}}
        @if (session("info"))
            <div class="alert alert-info">
                {{ session("info")}}
            </div>
        @endif
            
        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h3>{{$article->title}}</h3>
                    <div>
                        <b class="text-success">
                            {{$article->user->name}}
                        </b>
                        <small class="text-muted">
                            <b>Category: </b>
                            <span class="text-success">
                                {{$article->category->name}}
                            </span>,
                            <b>Comment: </b>
                            <span class="text-primary">
                                {{count($article->comments)}}
                            </span>,
                            {{$article->created_at}}
                        </small>
                    </div>
                    <div>
                        {{ $article->body }}
                    </div>
                    <a class="card-link" href="{{ url("/articles/detail/$article->id") }}">View Detail
                    </a>
                </div>
            </div>            
        @endforeach
    </div>
@endsection