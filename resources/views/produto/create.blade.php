@extends('app')

@section('content')
    @include('errors.list')
    {!! Form::open(['route' => 'produto.store', 'method' => 'POST']) !!}
        <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Novo Produto</legend>
        @include('produto.form', ['submiteButtonText' => 'Cadastrar Novo', 'gly' => 'plus'])
    {!! Form::close() !!}
@endsection
@stop