@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <legend><span class="glyphicon glyphicon-saved"></span> Protudos Cadastrados</legend>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <a href="{{ url('produto/create') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-plus"></span> Novo Produto</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-bordered" id="product-grid">
                <thead>
                <tr>
                    <th data-header-css-class="col-md-2" data-column-id="codigo" >Código</th>
                    <th data-header-css-class="col-md-8" data-column-id="nome">Nome</th>
                    <th data-header-css-class="col-md-2" data-column-id="preco" data-searchable="false" data-sortable="false">Preço</th>
                    <th data-header-css-class="col-md-2" data-column-id="commands" data-formatter="commands" data-searchable="false" data-sortable="false">Editar</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <input id="produtos" type="hidden" value="{{ $produtos }}"/>
@stop