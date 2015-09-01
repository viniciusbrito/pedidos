{!! Form::hidden('produto_id', $produto_id) !!}
<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#removerModal" data-title="Remover Produto" data-message="Você tem certeza que quer remover este produto?">
    <span class="glyphicon glyphicon-trash"></span>
</button>
{!! Form::close() !!}