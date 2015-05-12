@extends('app')

@section('content')

    <div class="row">
        <div class="coll-md-3">
            <h1>{{ $produto->codigo }} {{ $produto->nome }}</h1>
        </div>
        <div class="row">
        	<div class="col-md-3">
                <a href="{{ url('/produto', $produto->id) }}/edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        	</div>
            <div class="col-md-3">
                <a href="{{ url('/produto', $produto->id) }}/remover" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover</a>
            </div>
        </div>
    </div>
@stop