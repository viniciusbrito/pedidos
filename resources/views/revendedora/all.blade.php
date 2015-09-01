@extends('app')

@section('content')
    <legend><span class="glyphicon glyphicon-saved"></span> Revendedores Cadastrados</legend>

    @if(count($revendedores))
        <div class="panel panel-default">

            <table class="table table-striped table-responsive">
                <thead>
                <td><strong>Código</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Telefone</strong></td>
                <td colspan="3"></td>
                </thead>
                @foreach($revendedores as $revendedor)
                    <tr>
                        <td>
                            {{ $revendedor->codigo }}
                        </td>
                        <td>
                            {{ $revendedor->nome }}
                        </td>
                        <td>
                            {{ $revendedor->telefone }}
                        </td>
                        <td  class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}" class="btn btn-primary" title="Visualizar"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td class="text-center"><a href="{{ url('/revendedor', $revendedor->id) }}/edit" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td class="text-center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['revendedor.destroy', $revendedor->id]]) !!}
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-center">{!! $revendedores->render() !!}</td>
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