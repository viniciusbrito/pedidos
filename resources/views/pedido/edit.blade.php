@extends('app')
@section('content')
@include('errors.list')
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
        {!! Form::text('quantidade', null, ['class' => 'form-control', 'placeholder' => 'Quantidade', 'required']) !!}
    </div>
    <div class="col-sm-5">
        {!! Form::hidden('produto_id', null, ['id' => 'produto_id']) !!}
        <input type="submit" class="btn btn-info" value="Adicionar"/>
        {!! Form::close() !!}
    </div>
</div>

<br/>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Produtos adicionados</h3>
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
                                {!! Form::open(['route' => ['pedido.destroy', $pedido->id], 'method' => 'DELETE']) !!}
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
    <div class="panel panel-heading"><h3 class="panel-title">Informações do pedido</h3></div>
    <div class="panel-body">
        <table class="table table-striped table-responsive">
            <thead>
                <td ><strong>Número de Itens:</strong> <label style="color: blue">{{ $pedido->itens() }} itens </label></td>
                <td><strong>Total:</strong> <label style="color: blue">R$ {{ $pedido->total() }}</label></td>
                <td></td>
            </thead>
            <tr>
                <td>
                    <a href="#" class="btn btn-primary">Salvar</a>
                </td>
                <td>
                    <a href="#" class="btn btn-success">Finalizar</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger">Cancelar</a>
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection
