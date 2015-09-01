@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-edit"></span> Editar Revendedor</legend>
    @include('errors.list')
    {!! Form::model($revendedor, ['method' => 'PATCH', 'action' => ['RevendedoraController@update', $revendedor->id]]) !!}
    @include('revendedora.form', ['date' => $revendedor->nascimento->format('Y-m-d'), 'submiteButtonText' => 'Salvar', 'gly' => 'save'])
    {!! Form::close() !!}
@endsection