@extends('layouts.app')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="row">
    <h1>Edycja</h1>
<form action="{{route('update', $book[0]->id)}}" method="POST">
    <div class="form-group">
        <h3> <span class="label label-default">Tytuł</span></h3>
        <input name="title" type="text" value="{{$book[0]->title}}" class="form-control">
    </div>
    <div class="form-group">
        <h3> <span class="label label-default">Autor</span></h3>
        <input name="author" value="{{$book[0]->author}}" type="text" class="form-control">
    </div>
    <div class="form-group">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button type="submit" class="btn btn-info">Zatwierdź </button>
    </div>
</form>
</div>
@stop