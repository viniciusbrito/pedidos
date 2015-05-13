@extends('app')

@section('content')
    @include('errors.list')
    {!! Form::model($produto, ['method' => 'PATCH', 'route' => ['produto.update', $produto->id]]) !!}
    <legend><span class="glyphicon glyphicon-edit"></span> Editar Produto</legend>
    @include('produto.form', ['submiteButtonText' => 'Atualizar', 'gly' => 'save'])
    {!! Form::close() !!}
@endsection
@stop