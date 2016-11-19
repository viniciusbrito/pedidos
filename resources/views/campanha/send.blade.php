{!! Form::open(['method' => 'POST', 'route' => ['campanha.send', $pedido_id]]) !!}
<div class="row">
    <div class="col-sm-9">
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Informe o e-mail para enviar os pedidos']) !!}
    </div>
    <div class="col-sm-3">
        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-send"></span> Enviar</button>
    </div>
</div>
{!! Form::close() !!}