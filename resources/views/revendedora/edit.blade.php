@extends('revendedora.index')

@section('content')
    <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Novo Revendedor</legend>
    @include('errors.list')
    {!! Form::model($revendedor, ['method' => 'PATCH', 'action' => ['RevendedoraController@update', $revendedor->id]]) !!}
    @include('revendedora.form', ['submiteButtonText' => 'Salvar'])
    {!! Form::close() !!}
@endsection