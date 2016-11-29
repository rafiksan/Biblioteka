@extends('layouts.app')
@section('content')
<div class="row">
    <table class="table table-hover">
        <thead>
            <tr>
               
                <td>Tytuł</td>
                <td>Autor</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $b)
                <tr>
                    <td>
                        {{$b->title}}
                    </td>
                    <td>
                        {{$b->author}}
                    </td>
                    <td>
                        <a href="{{route('edit',$b->id)}}" class="btn btn-default">Edytuj</a>
                    </td>
                    <td>
                        <form action="{{route('delete', $b->id)}}" method="POST">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('create')}}" class="btn btn-default"> Dodaj nową książkę</a>
</div>
@stop