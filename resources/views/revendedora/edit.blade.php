@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-edit"></span> Editar Revendedor</legend>
    @include('errors.list')
    {!! Form::model($revendedor, ['method' => 'PATCH', 'action' => ['RevendedoraController@update', $revendedor->id]]) !!}
    @include('revendedora.form', [
                                    'nascimento' => $revendedor->nascimento->format('Y-m-d'),
                                    'autorizacaoSMS' => $revendedor->autorizacaoSMS,
                                    'nascimentoMae' => $revendedor->nascimentoMae->format('Y-m-d'),
                                    'nascimentoConjuge' => $revendedor->nascimentoConjuge->format('Y-m-d'),
                                    'submiteButtonText' => 'Salvar', 'gly' => 'save'
                                 ]
    )
    {!! Form::close() !!}
@endsection