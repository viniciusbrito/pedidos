<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'autofocus' => 'true']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-{{ $gly }}"></span> {{ $submiteButtonText }}</button>
    <a href="{{ url('revendedor') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
</div>