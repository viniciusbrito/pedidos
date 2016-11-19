<div class="form-group">
    {!! Form::label('codigo', 'Código') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control', 'autofocus']) !!}
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
    {!! Form::text('preco', null, ['type' => 'tel', 'class' => 'form-control', 'placeholder' => 'Somente números']) !!}
</div>

<div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-{{ $gly }}"></span> {{ $submiteButtonText }}</button>
    <a href="{{ url('produto') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
</div>
