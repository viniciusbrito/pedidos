@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Novo Revendedor</legend>
    @include('errors.list')
    {!! Form::open(['method' => 'POST', 'action' => 'RevendedoraController@index']) !!}
    @include('revendedora.form', ['nascimento' => '', 'autorizacaoSMS' => 1, 'nascimentoMae' => '', 'nascimentoConjuge' => '', 'submiteButtonText' => 'Cadastrar Novo', 'gly' => 'plus'])
    {!! Form::close() !!}
@endsection