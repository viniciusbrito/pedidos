<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'autofocus' => 'true']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submiteButtonText, ['class' => 'btn btn-primary']) !!}
    {!! Html::link(url('revendedor'), 'Cancelar', ['class' => 'btn btn-danger']) !!}
</div>