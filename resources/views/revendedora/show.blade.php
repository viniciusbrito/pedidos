@extends('app')
@section('content')

    <div class="row">
        <div class="col-sm-11">
            <legend>
                <span class="glyphicon glyphicon-check">
                {{ $revendedor->nome }}
            </legend>
        </div>
        <div class="col-sm-1">
            <a href="{{ url('revendedor') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> Informações Pessoais</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="coll-md-3">
                            <label>Telefone:</label> {{ $revendedor->telefone }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <a href="{{ url('/revendedor', $revendedor->id) }}/edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        </div>
        <div class="col-sm-1">
            <a href="{{ url('/revendedor', $revendedor->id) }}/remover" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> Pedidos Realizados</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="coll-md-3">
                            @unless($revendedor->pedido)
                                <table class="table table-striped">
                                    <thead>
                                        <td><strong>Data do Pedido</strong></td>
                                        <td><strong>Status do Pedido</strong></td>
                                        <td><strong>Visualizar</strong></td>
                                    </thead>
                                    @foreach($revendedor->pedidos()->orderBy('updated_at', 'desc')->get() as $pedido)
                                        <tr>
                                            <td>
                                               {{ $pedido->updated_at->format("d/m/Y H:i:s") }}
                                            </td>
                                            <td>
                                                Status
                                            </td>
                                            <td>
                                                <a href="{{ url('/pedido', $pedido->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@stop
