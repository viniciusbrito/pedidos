@extends('app')

@section('content')
    <h1>{{ $revendedor->nome }}</h1>
    <div class="row">
        <legend><span class="glyphicon glyphicon-info-sign"></span> Informações Pessoais</legend>
        <div class="coll-md-3">
            <label>Telefone:</label> {{ $revendedor->telefone }} <br/>
        </div>
    </div>

    <div class="row">
        <hr/>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/revendedor', $revendedor->id) }}/edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('/revendedor', $revendedor->id) }}/remover" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover</a>
        </div>
    </div>

    <div class="row">
        <hr/>
    </div>

    <div class="row">
        <legend><span class="glyphicon glyphicon-info-sign"></span> Pedidos Realizados</legend>
        <div class="coll-md-3">
            <span class="glyphicon glyphicon-alert"></span> <strong>Ainda em construção</strong>
        </div>
    </div>

@endsection
@stop
