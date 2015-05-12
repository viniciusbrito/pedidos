@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Novo Revendedor</legend>
    @include('errors.list')
    {!! Form::open(['method' => 'POST', 'action' => 'RevendedoraController@index']) !!}
    @include('revendedora.form', ['submiteButtonText' => 'Cadastrar Novo'])
    {!! Form::close() !!}
@endsection