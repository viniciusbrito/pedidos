@extends('app')
@section('content')
    @include('errors.list')
    <div class="row">
        <div class="col-sm-11">
            <legend>
                <span class="glyphicon glyphicon-saved"></span>
                @if(count($pedidos))
                    Pedidos Cadastrados: Campanha {{ $pedidos->first()->campanha->created_at->format('Y/m') }}
                @else
                    Pedidos Cadastrados
                @endif
            </legend>
        </div>
        <div class="col-sm-1">
            <a href="{{ route('campanha.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>

    <!-- informações do pedido -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> Informações do Pedidos</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Num de pedidos:</strong> {{ $campanha->total('all') }} pedidos
                        </div>
                        <div class="col-sm-4">
                            <strong>Status:</strong> {{ $campanha->status() }}
                        </div>
                        <div class="col-sm-4">
                            <strong>Valor Bruto:</strong> R$ {{ $campanha->bruto() }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Em Escrita:</strong> {{ $campanha->total('write') }} pedidos
                        </div>
                        <div class="col-sm-4">
                            <strong>Criado em:</strong> {{ $campanha->created_at->format('d/m/Y H:i:s') }}
                        </div>
                        <div class="col-sm-4">
                            <strong>{{ ($campanha->sent)? 'Pedido enviado' : 'Pedido não enviado' }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Finalizados:</strong> {{ $campanha->total('close') }} pedidos
                        </div>
                        <div class="col-sm-4">
                            <strong>Ultima modificação:</strong> {{ $campanha->updated_at->format('d/m/Y H:i:s') }}
                        </div>
                        <div class="col-sm-4">
                            @if(!$campanha->status)
                                {!! Form::open(['method' => 'PATCH', 'route' => ['campanha.update', $campanha->id]]) !!}
                                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Finalizar Campanha</button>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- novo pedido - pdf -->
    @if(!$campanha->status)
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('pedido.create', $campanha->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Novo Pedido</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-12">
                @include('campanha.send', ['pedido_id' => $campanha->id])
            </div>
        </div>
    @endif
    <br/>
    <!-- lista os pedidos -->
    <div class="row">
        <div class="col-sm-12">
            @if(count($pedidos))
                <div class="panel panel-default">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <td>
                            <strong>Nome</strong>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=nome&direc=asc') }}" title="Crescente"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=nome&direc=desc') }}" title="Decrescente"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                        </td>
                        <td>
                            <strong>Situação</strong>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=status&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=status&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                        </td>
                        <td>
                            <strong>Ultima modificação</strong>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=update&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=update&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
                        </td>
                        <td>
                            <strong>Data do Pedido</strong>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=create&direc=asc') }}"><span class="glyphicon glyphicon-sort-by-attributes"></span></a>
                            <a href="{{ url('campanha/'.$campanha->id.'/pedidos/?order=create&direc=desc') }}"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></a>
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
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
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
        </div>
    </div>
@endsection