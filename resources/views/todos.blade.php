@extends('layouts.app');

@section('content')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong>{{Session::get('success')}}
        </div>
        @endif
        @if(count($all_todo)==0)
            <div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            No <strong>Todos!</strong> exists
        </div>
        @endif
        @foreach($all_todo as $todo)
            
            <div class="panel {{!$todo->completion ? 'panel-primary' : 'panel-default'}}">
                <div class="panel-heading">{{$todo->title}}
                    <a href="delete/{{$todo->id}}" class="pull-right text-warning" >
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="edit/{{$todo->id}}" class="pull-right" style="margin-right: 5px">
                        <span class="glyphicon glyphicon-edit" style="color:#fff"></span>
                    </a>
                </div>
                <div class="panel-body">{{ $todo->todo}}</div>
                <div class="panel-footer">
                    <span class="badge"> {{ $todo->date}}</span>
                    @if(!$todo->completion)
                    <span class="pull-right">
                        <a class="btn btn-xs btn-success" href="/complete/{{$todo->id}}">mark as completed</a>
                    </span>
                    @else
                    <span class="pull-right">
                        <span class="badge">completed</span>
                    </span>
                    @endif
                </div>
            </div>
            
        @endforeach
        <div class="text-center">{{$all_todo->render()}}</div>
    </div>
@endsection