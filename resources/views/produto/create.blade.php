@extends('produto.index')

@section('content')
    @include('errors.list')
    {!! Form::open(['method' => 'POST', 'action' => 'ProdutoController@index']) !!}
        <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Novo Produto</legend>
        @include('produto.form', ['submiteButtonText' => 'Cadastrar Novo'])
    {!! Form::close() !!}
@endsection
@stop