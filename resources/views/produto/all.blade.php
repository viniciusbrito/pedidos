@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-saved"></span> Protudos Cadastrados</legend>
    @if(count($produtos))
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                <td><strong>Código</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Descrição</strong></td>
                <td colspan="2"><strong>Preço</strong></td>
                </thead>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->codigo }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td class="text-center"><a href="{{ url('/produto', $produto->id) }}/edit" class="btn btn-success"title="Visualizar"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <!-- remover -->
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-center">{!! $produtos->render() !!}</td>
                </tr>
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