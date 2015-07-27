<div class="col-md-12">
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('codigo', 'Código') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control', 'autofocus' => 'true']) !!}
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cpf', 'CPF') !!}
            {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('rg', 'RG') !!}
            {!! Form::text('rg', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('nascimento', 'Nascimento') !!}
            {!! Form::input('date', 'nascimento', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('telefone', 'Telefone') !!}
            {!! Form::input('tel', 'telefone', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('telefone2', 'Telefone 2') !!}
            {!! Form::input('tel', 'telefone2', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('telefone3', 'Telefone 3') !!}
            {!! Form::input('tel', 'telefone3', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('endereco', 'Endereço') !!}
            {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('bairro', 'Bairro') !!}
            {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cep', 'CEP') !!}
            {!! Form::text('cep', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('cidade', 'Cidade') !!}
            {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('uf', 'UF') !!}
            {!! Form::text('uf', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-{{ $gly }}"></span> {{ $submiteButtonText }}</button>
    <a href="{{ url('revendedor') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
</div>