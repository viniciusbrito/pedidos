@extends('produto.index')

@section('content')
    @include('errors.list')
    {!! Form::model($produto, ['method' => 'PATCH', 'action' => ['ProdutoController@update', $produto->id]]) !!}
    <legend><span class="glyphicon glyphicon-edit"></span> Editar Produto</legend>
    @include('produto.form', ['submiteButtonText' => 'Atualizar'])
    {!! Form::close() !!}
@endsection
@stop