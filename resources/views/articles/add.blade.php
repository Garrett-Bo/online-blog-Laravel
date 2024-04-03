@extends("layouts.app")
@section("content")
    <div class="container" style="max-width: 800px">

        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $err)
                    {{$err}}
                @endforeach
            </div>
        @endif

        <form method="post">
            @csrf
            <div class="mb-2">
                <label for="">title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-2">
                <label for="">Body</label>
                <input type="text" class="form-control" name="body">
            </div>
            <div class="mb-2">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-select">
                    <option value="1">News</option>
                    <option value="2">Tech</option>
                </select>
            </div>
            <button class="btn btn-primary">Add Article</button>
        </form>
    </div>
@endsection