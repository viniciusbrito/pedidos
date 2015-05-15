@extends('app')
@section('content')
    @include('errors.list')

    <div class="row">
        {!! Form::open(['method' => 'POST', 'route' => 'revendedora.search', 'id' => 'search_revendedor']) !!}
        <div class="col-sm-10">
            {!! Form::text('key', null, ['class' => 'form-control text-uppercase', 'required', 'placeholder' => 'Revendedor', 'id' => 'input_revendedor']) !!}
            {!! Form::close() !!}
            {!! Form::open(['method' => 'POST', 'route' => 'pedido.store']) !!}
            {!! Form::hidden('revendedor_id', null, ['id' => 'revendedor_id']) !!}
        </div>

        <div class="col-sm-2">
            {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-sm-10">
            <div id="list_revendedor" class="list-group">
                <div class="list-group"><!--Carrega aqui os dados de pesquisa do produto--></div>
            </div>
        </div>
    </div>

@endsection