@extends('app')
@section('content')
@include('partials.remover')
@include('errors.list')
@include('campanha.createProdutoModal')
<legend><span class="glyphicon glyphicon-edit"></span> <strong>Revendedor:</strong> {{ $pedido->revendedora->nome }}</legend>

<div class="panel panel-success">
    {!! Form::open(['route' => 'produto.search', 'method' => 'POST', 'id' => 'search_produto']) !!}
    {!! Form::text('key', null, ['class' => 'form-control text-uppercase', 'required', 'id' => 'input_produto', 'placeholder' => 'Código do produto', 'autofocus']) !!}
    {!! Form::close() !!}
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::open(['id' => 'insert_produto', 'method' => 'PATCH', 'route' => ['pedido.update', $pedido->id]]) !!}
        <div id="list_produto" class="list-group produto"><!--Carrega aqui os dados de pesquisa do produto--></div>
    </div>
    <div class="col-sm-2">
        {!! Form::text('quantidade', null, ['id' => 'quantidade', 'class' => 'form-control', 'placeholder' => 'Quantidade', 'required']) !!}
    </div>
    <div class="col-sm-5">
        {!! Form::hidden('produto_id', null, ['id' => 'produto_id']) !!}
        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Adicionar</button>
        {!! Form::close() !!}
    </div>
</div>

<br/>
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
                <td>Remover</td>
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
                            <td>
                                {!! Form::open(['route' => ['pedido.remove', $pedido->id], 'method' => 'POST']) !!}
                                @include('pedido.form_remover', ['produto_id' => $produto->id])
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
<div class="panel panel-info">
    <div class="panel panel-heading"><h3 class="panel-title">
            <span class="glyphicon glyphicon-info-sign"></span> Informações do pedido</h3>
    </div>
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <td><strong>Número de Itens:</strong> <label style="color: blue">{{ $pedido->itens() }} itens </label></td>
                <td colspan="2"><strong>Total:</strong> <label style="color: blue">R$ {{ $pedido->total() }}</label></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="{{ url('campanha/'.$pedido->campanha->id.'/pedidos') }}" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Salvar</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'PUT', 'route' => 'pedido.close']) !!}
                    {!! Form::hidden('id', $pedido->id) !!}
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Finalizar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['pedido.destroy', $pedido->id]]) !!}
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Pedido" data-message="Você tem certeza que quer remover este pedido?">
                        <span class="glyphicon glyphicon-trash"></span> Exlcuir
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
