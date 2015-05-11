@extends('produto.index')

@section('content')
    <legend><span class="glyphicon glyphicon-saved"></span> Protudos Cadastrados</legend>
    @if(count($produtos))
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <td><strong>Código</strong></td>
                    <td><strong>Nome</strong></td>
                    <td><strong>Descrição</strong></td>
                    <td><strong>Preço</strong></td>
                </thead>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->codigo }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td><a href="{{ url('/produto', $produto->id) }}/edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
                        <td><a href="{{ url('/produto', $produto->id) }}/remover" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover</a></td>
                    </tr>

                @endforeach
            </table>
        </div>
    @else
        <div class="alert alert-info">
            <p>Não há produtos cadastrados!</p>
        </div>
    @endif
    <hr>
    <a href="{{ url('produto/create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Novo Produto</a>
@stop