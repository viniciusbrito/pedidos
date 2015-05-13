@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-saved"></span> Revendedores Cadastrados</legend>

    @if(count($revendedores))
        <div class="panel panel-default">

            <table class="table table-striped table-responsive">
                <thead>
                <td><strong>Nome</strong></td>
                <td><strong>Telefone</strong></td>
                <td colspan="3"></td>
                </thead>
                @foreach($revendedores as $revendedor)
                    <tr>
                        <td>
                            {{ $revendedor->nome }}
                        </td>
                        <td>
                            {{ $revendedor->telefone }}
                        </td>
                        <td  class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}" class="btn btn-primary" title="Visualizar"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}/edit" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}/remover" class="btn btn-danger" title="Remover"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-center">{!! $revendedores->render() !!}</td>
                </tr>
            </table>
        </div>
    @else
        <div class="alert alert-info">
        	<strong>Não há revendedores cadastrados!</strong>
        </div>
    @endif
    <a href="{{ url('/revendedor/create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Novo Revendedor</a>
@endsection
@stop