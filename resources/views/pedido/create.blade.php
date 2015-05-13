@extends('app')
@section('content')
    {!! Form::open(['method' => 'POST', 'action' => 'PedidoController@store']) !!}
    {!! Form::label('revendedor', 'Revendedor') !!}
    {!! Form::select('revendedor', ['Selecione', $revendedoras], null, ['class' => 'form-controll', 'required']) !!}
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection