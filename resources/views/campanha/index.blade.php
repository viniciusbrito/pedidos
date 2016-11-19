@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend>
                <span class="glyphicon glyphicon-saved"></span>
                Histórico de Campanhas
            </legend>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if(count($campanhas))
                <div class="panel panel-default">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <td>
                                <strong>Campanhas</strong>
                            </td>
                            <td>
                                <strong>Data</strong>
                            </td>
                            <td>
                                <strong>Situação</strong>
                            </td>
                            <td>
                                <strong>Quantidade de Pedidos</strong>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($campanhas as $campanha)
                                <tr>
                                    <td>
                                        Campanha de {{ $campanha->created_at->format('M') }}
                                    </td>
                                    <td>
                                        {{ $campanha->created_at->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        {{ $campanha->status() }}
                                        {{ ($campanha->sent)? ' e enviado' : '' }}
                                    </td>
                                    <td>
                                        {{ $campanha->total('all') }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('/campanha/'.$campanha->id.'/pedidos') }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-center">{!! $campanhas->render() !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">Não há campanhas cadastradas!</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('campanha.create')
        </div>
    </div>

@endsection