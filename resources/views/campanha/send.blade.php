{!! Form::open(['method' => 'POST', 'route' => ['campanha.send', $pedido_id]]) !!}
<div class="col-sm-6">
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
</div>
<div class="col-sm-6">
    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Enviar</button>
</div>