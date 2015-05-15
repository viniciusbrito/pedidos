@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-saved"></span> Pedidos Cadastrados</legend>
    @if(count($pedidos))
        <div class="panel panel-default">

            <table class="table table-striped table-responsive">
                <thead>
                <td><strong>Nome</strong></td>
                <td><strong>Ultima modificação</strong> <span class="caret"></span></td>
                <td><strong>Data do Pedido</strong></td>
                <td colspan="3"></td>
                </thead>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>
                            {{ $pedido->revendedora->nome }}
                        </td>
                        <td>
                            {{ $pedido->updated_at->format('d/m/Y H:i:s') }}
                        </td>
                        <td>
                            {{ $pedido->created_at->format('d/m/Y H:i:s') }}
                        </td>
                        <td  class="text-center"><a href="{{ url('/pedido', $pedido->id) }}" class="btn btn-primary" title="Visualizar"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td class="text-center"><a href="{{ url('/pedido', $pedido->id) }}/edit" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td class="text-center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['pedido.destroy', $pedido->id]]) !!}
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-center">{!! $pedidos->render() !!}</td>
                </tr>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            <strong>Não há pedidos cadastrados!</strong>
        </div>
    @endif
    <a href="{{ url('/pedido/create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Novo Pedido</a>
@endsection