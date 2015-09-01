@extends('app')

@section('content')
    @include('partials.remover')
    <legend><span class="glyphicon glyphicon-saved"></span> Pedidos Cadastrados</legend>
    @if(count($pedidos))
        <div class="panel panel-default">

            <table class="table table-striped table-responsive">
                <thead>
                <td>
                    <strong>Nome</strong>
                    <a href="{{ url('campanha/pedido/?order=nome&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                    <a href="{{ url('campanha/pedido/?order=nome&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                </td>
                <td>
                    <strong>Situação</strong>
                    <a href="{{ url('campanha/pedido/?order=status&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                    <a href="{{ url('campanha/pedido/?order=status&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                </td>
                <td>
                    <strong>Campanha</strong>
                    <a href="{{ url('campanha/pedido/?order=campanha&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                    <a href="{{ url('campanha/pedido/?order=campanha&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                </td>
                <td>
                    <strong>Ultima modificação</strong>
                    <a href="{{ url('campanha/pedido/?order=update&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                    <a href="{{ url('campanha/pedido/?order=update&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                </td>
                <td>
                    <strong>Data do Pedido</strong>
                    <a href="{{ url('campanha/pedido/?order=create&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                    <a href="{{ url('campanha/pedido/?order=create&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                </td>
                <td colspan="4"></td>
                </thead>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>
                            {{ $pedido->revendedora->nome }}
                        </td>

                        <td>
                            {{ $pedido->status->status }}
                        </td>

                        <td>
                            Campanha {{ $pedido->campanha->created_at->format('M') }} / {{ $pedido->campanha->id }}
                        </td>

                        <td>
                            {{ $pedido->updated_at->format('d/m/Y H:i:s') }}
                        </td>

                        <td>
                            {{ $pedido->created_at->format('d/m/Y H:i:s') }}
                        </td>

                        <td  class="text-center">
                            <a href="{{ url('campanha/pedido', $pedido->id) }}" class="btn btn-primary" title="Visualizar"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </td>

                        <td class="text-center">
                            @if($pedido->status_id == 1)
                                <a href="{{ url('campanha/pedido', $pedido->id) }}/edit" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
                            @endif
                        </td>

                        <td class="text-center">
                            @if($pedido->status_id == 1)
                                {!! Form::open(['method' => 'DELETE', 'route' => ['pedido.destroy', $pedido->id]]) !!}
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Pedido" data-message="Você tem certeza que quer remover este pedido?">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="7" class="text-center">{!! $pedidos->render() !!}</td>
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