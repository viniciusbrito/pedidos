@extends('app')
@section('content')
    @include('partials.remover')
    @include('partials.desativar')
    <legend><span class="glyphicon glyphicon-saved"></span> Revendedores Cadastrados</legend>

    <app  id="revend">
        {{--<div class="well">
            <pre>@{{ search | json }}</pre>
        </div>--}}
        <div class="row">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="pesquisar" placeholder="Buscar revendedor" v-model="search.text" v-on="keyup:doFilter"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4"><label for="">Buscar por:</label></div>
                            <div class="col-sm-4"><input type="radio" name="buscarPor" value="nome" v-model="search.field" /> Nome </div>
                            <div class="col-sm-4"><input type="radio" name="buscarPor" value="codigo" v-model="search.field"/> Código</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <select name="perPage" id="" class="form-control" v-model="paginate.perPage" v-on="change:doPerPage">
                            <option value="5">Exbir 5 Revendedores por página</option>
                            <option value="10">Exbir 10 Revendedores por página</option>
                            <option value="15">Exbir 15 Revendedores por página</option>
                            <option value="20">Exbir 20 Revendedores por página</option>
                            <option value="25">Exbir 25 Revendedores por página</option>
                            <option value="50">Exbir 50 Revendedores por página</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 text-right">
                <a href="{{ url('/revendedor/create') }}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> Novo Revendedor</a>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <td>
                                <a href="#" v-on="click:doSortBy($event, 'codigo')">
                                    <i class="fa fa-fw fa-sort"
                                       v-class="fa-sort-amount-asc:sortBy.field == 'codigo' && sortBy.reverse == false,
                                       fa-sort-amount-desc:sortBy.field == 'codigo' && sortBy.reverse == true">
                                    </i>
                                    <strong>Código</strong>
                                </a>
                            </td>
                            <td>
                                <a href="#" v-on="click:doSortBy($event, 'nome')">
                                    <i class="fa fa-fw fa-sort"
                                       v-class="fa-sort-amount-asc:sortBy.field == 'nome' && sortBy.reverse == false,
                                           fa-sort-amount-desc:sortBy.field == 'nome' && sortBy.reverse == true">
                                    </i>
                                    <strong>Nome</strong>
                                </a>
                            </td>
                            <td>
                                <strong>Telefone</strong>
                            </td>
                            <td colspan="3"></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-repeat="revendedor:revendedores">
                            <td>
                                @{{ revendedor.codigo }}
                            </td>
                            <td>
                                @{{ revendedor.nome }}
                            </td>
                            <td>
                                @{{ revendedor.telefone }}
                            </td>
                            <td v-show="revendedor.ativo" class="text-center">
                                <form method="POST" action="/revendedor/@{{ revendedor.id }}/status" accept-charset="UTF-8">
                                    {{--<input name="_method" type="hidden" value="DELETE">--}}
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#desativarModal" data-title="Desativar Revendedor(a)" data-message="Desativar @{{ revendedor.nome }}?">
                                        Desativar
                                    </button>
                                </form>
                            </td>
                            <td v-show="!revendedor.ativo" class="text-center">
                                <form method="POST" action="/revendedor/@{{ revendedor.id }}/status" accept-charset="UTF-8">
                                    {{--<input name="_method" type="hidden" value="DELETE">--}}
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#desativarModal" data-title="Ativar Revendedor(a)" data-message="Ativar @{{ revendedor.nome }}?">
                                        Ativar
                                    </button>
                                </form>
                            </td>
                            <td  class="text-center"><a href="revendedor/@{{ revendedor.id }}" class="btn btn-primary" title="Visualizar"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                            <td class="text-center"><a href="revendedor/@{{ revendedor.id }}/edit" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td class="text-center">
                                <form method="POST" action="revendedor/@{{ revendedor.id }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Revendedor(a)" data-message="Você tem certeza que quer remover?">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <nav class="text-center">
                    <ul class="pagination">
                        <li v-class="disabled:paginate.currentPage == 1">
                            <a href="#" aria-label="Previous" v-on="click:doPrevious">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-repeat="paginate.pageNum" v-class="active:paginate.currentPage == $value">
                            <a href="#" v-on="click:doPage($event, $value)">@{{ $value }}</a>
                        </li>
                        <li v-class="disabled:paginate.currentPage == paginate.totalPages">
                            <a href="#" aria-label="Next" v-on="click:doNext">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </app>
@endsection
@stop