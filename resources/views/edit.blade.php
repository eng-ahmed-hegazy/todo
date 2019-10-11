@extends('layouts.app');

@section('content')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <div class="container">
        <div class="panel">
            <h1 class="page-header">EDIT</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/edit/{{$todo_edit->id}}" class="form" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="usr">Title</label>
                <input value="{{$todo_edit->title}}" type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Content</label>
                <textarea name="todo" class="form-control" rows="4" cols="50" style="resize: none">
                    {{$todo_edit->todo}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="usr">Date</label>
                <input type="date" value="{{$todo_edit->date}}" name="date" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" style="width:150px" value="Edit">
        </form>
    </div>
@stop