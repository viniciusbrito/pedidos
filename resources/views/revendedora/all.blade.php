@extends('revendedora.index')

@section('content')
    <legend><span class="glyphicon glyphicon-saved"></span> Revendedores Cadastrados</legend>

    @if(count($revendedores))
        <div class="table-responsive">
            <table class="table table-striped">
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
                        <td  class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Visualizar</a></td>
                        <td class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}/edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
                        <td class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}/remover" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Remover</a></td>
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