@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-11">
            <legend><span class="glyphicon glyphicon-check"></span>
                <strong>Revendedor:</strong> {{ $pedido->revendedora->nome }}
            </legend>
        </div>
        <div class="col-sm-1">
            <a href="{{ route('campanha.pedidos', $pedido->campanha->id) }}" class="btn btn-default">Voltar</a>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> Informações do pedido</h3>
        </div>
        <div class="pane panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <strong>Criado em:</strong> {{ $pedido->created_at->format('d/m/Y h:i:s') }}
                </div>
                <div class="col-sm-6">
                    <strong>Valor total:</strong> R$ {{ $pedido->total() }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Modificado em:</strong> {{ $pedido->updated_at->format('d/m/Y h:i:s') }}
                </div>
                <div class="col-sm-6">
                    <strong>Quantidade produtos:</strong> {{ count($pedido->produto) }} itens
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <strong>Situação do pedido:</strong> {{ $pedido->status->status }}
                </div>
                <div class="col-sm-6">
                    <strong>Quantidade total:</strong> {{ $pedido->itens() }} produtos
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span> Produtos adicionados</h3>
        </div>
        @if(count($pedido->produto))
            <div class="panel-body">
                <table class="table table-striped table-responsive">
                    <thead>
                    <td><strong>Código</strong></td>
                    <td><strong>Produto</strong></td>
                    <td><strong>Quantidade</strong></td>
                    <td><strong>Preço Unitário</strong></td>
                    <td><strong>Preço a pagar</strong></td>
                    </thead>
                    @foreach($pedido->produto as $produto)
                        <tr>
                            <td>
                                {{ $produto->codigo }}
                            </td>
                            <td>
                                {{ $produto->nome }}
                            </td>
                            <td>
                                {{ $produto->quantidade() }}
                            </td>
                            <td>
                                R$ {{ $produto->preco }}
                            </td>
                            <td>
                                R$ {{ $produto->ahpagar() }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="panel-body">
                Ainda não há produtos cadastrados
            </div>
        @endif
    </div>
@endsection