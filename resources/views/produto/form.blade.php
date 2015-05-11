<div class="form-group">
    {!! Form::label('codigo', 'Código') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<div class="form-group">
    {!! Form::label('preco', 'Preço') !!}
    {!! Form::text('preco', null, ['type' => 'tel', 'class' => 'form-control', 'placeholder' => 'Somente números', 'pattern'=> '?[0-9]{1,5},[0-9]{2}$']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submiteButtonText, ['class' => 'btn btn-primary']) !!}
    {!! Html::link(url('produto'), 'Cancelar', ['class' => 'btn btn-danger']) !!}
</div>