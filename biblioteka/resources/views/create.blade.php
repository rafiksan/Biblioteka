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
    <h1>Nowa książka</h1>
<form action="{{route('store')}}" method="POST">
    <div class="form-group">
        <h3> <span class="label label-default">Tytuł</span></h3>
        <input name="title" type="text"  class="form-control">
    </div>
    <div class="form-group">
        <h3> <span class="label label-default">Autor</span></h3>
        <input name="author"  type="text" class="form-control">
    </div>
    <div class="form-group">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button type="submit" class="btn btn-info">Zatwierdź </button>
    </div>
</form>
</div>
    <script type="text/javascript">

        $('div.alert').delay(2000).slideUp();
    </script>
@stop