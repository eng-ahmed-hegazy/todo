@extends('layouts.app');

@section('content')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="add" class="form col-lg-9" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="usr">Title</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="usr">Content</label>
            <textarea name="todo" class="form-control" rows="4" cols="50" style="resize: none">
                {{old('todo')}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="usr">Date</label>
            <input type="date" value="{{old('date')}}" name="date" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" style="width:150px" value="Add">
    </form>
</div>
@stop