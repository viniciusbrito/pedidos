@extends('app')
@section('content')
    @include('errors.list')
    <legend>
        <span class="glyphicon glyphicon-plus"></span> Novo pedido
    </legend>
    <div class="row">
        {!! Form::open(['method' => 'POST', 'route' => 'revendedora.search', 'id' => 'search_revendedor']) !!}
        <div class="col-sm-10">
            {!! Form::text('key', null, ['class' => 'form-control text-uppercase', 'required', 'placeholder' => 'Revendedor', 'id' => 'input_revendedor', 'autofocus']) !!}
            {!! Form::close() !!}
            {!! Form::open(['method' => 'POST', 'route' => 'pedido.store']) !!}
            {!! Form::hidden('revendedor_id', null, ['id' => 'revendedor_id']) !!}
            {!! Form::hidden('campanha_id', $campanha_id, []) !!}
        </div>

        <div class="col-sm-2">
            {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-sm-10">
            <div id="list_revendedor" class="list-group">
                <div class="list-group"><!--Carrega aqui os dados de pesquisa das revendedoras--></div>
            </div>
        </div>
    </div>
    <a href="{{ route('campanha.pedidos', $campanha_id) }}" class="btn btn-default">Voltar</a>

@endsection