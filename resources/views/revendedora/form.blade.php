<div class="row">
    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('codigo', 'Código') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control', 'autofocus' => 'true']) !!}
        </div>
    </div>
    <div class="col-xs-9">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2">
        <div class="form-group">
            {!! Form::label('estadoCivil', 'Estado Civil') !!}
            {!! Form::text('estadoCivil', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-1">
        <div class="form-group">
            {!! Form::label('sexo', 'Sexo') !!}
            {!! Form::text('sexo', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('nascimento', 'Nascimento') !!}
            {!! Form::input('date', 'nascimento', $nascimento, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('cpf', 'CPF') !!}
            {!! Form::text('cpf', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('rg', 'RG') !!}
            {!! Form::text('rg', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-2">
        <div class="form-group">
            {!! Form::label('telefone', 'Telefone') !!}
            {!! Form::input('tel', 'telefone', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-2">
        <div class="form-group">
            {!! Form::label('telefone2', 'Telefone') !!}
            {!! Form::input('tel', 'telefone2', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-2">
        <div class="form-group">
            {!! Form::label('telefone3', 'Telefone') !!}
            {!! Form::input('tel', 'telefone3', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-6">
        {!! Form::label('email', 'E-mail') !!} <small>Autoriza o envio de mensagens por SMS no celular e por e-mail</small>
        {!! Form::checkbox('autorizacaoSMS', $autorizacaoSMS, []) !!}
        {!! Form::text('email', null, ['class' => 'form-control input-sm']) !!}
    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('endereco', 'Endereço') !!}
            {!! Form::text('endereco', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('bairro', 'Bairro') !!}
            {!! Form::text('bairro', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('cidade', 'Cidade') !!}
            {!! Form::text('cidade', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2">
        <div class="form-group">
            {!! Form::label('cep', 'CEP') !!}
            {!! Form::text('cep', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-2">
        <div class="form-group">
            {!! Form::label('uf', 'UF') !!}
            {!! Form::text('uf', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-2">
        {!! Form::label('tempoResidencia', 'Tempo de Residencia') !!}
        {!! Form::text('tempoResidencia', null, ['class' => 'form-control input-sm']) !!}
    </div>

    <div class="col-xs-3">
        {!! Form::label('situacaoResidencia', 'Situação Residencia') !!}
        {!! Form::select('situacaoResidencia', [0 => 'Selecione', 1 => 'Propria (Liquidada)', 2 => 'Propria (Financiada)', 3 => 'Alugada', 4 => 'Pais', 5 => 'Parentes', 6 => 'Outros'], null, ['class' => 'form-control']) !!}

    </div>
</div>

<hr/>

<div class="row">
    <div class="col-xs-6">
        {!! Form::label('nomeMae', 'Nome da Mãe') !!}
        {!! Form::text('nomeMae', null, ['class' => 'form-control input-sm']) !!}
    </div>

    <div class="col-xs-3">
        {!! Form::label('nascimentoMae', 'Data Nascimento da Mãe') !!}
        {!! Form::input('date', 'nascimentoMae', $nascimentoMae, ['class' => 'form-control input-sm']) !!}
    </div>
</div>

<hr/>
<legend>Dados do Cônjuge</legend>


<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('nomeConjuge', 'Nome') !!}
            {!! Form::text('nomeConjuge', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>

    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('nascimentoConjuge', 'Data Nascimento') !!}
            {!! Form::input('date', 'nascimentoConjuge', $nascimentoConjuge, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group">
            {!! Form::label('telefoneConjuge', 'Telefone') !!}
            {!! Form::text('telefoneConjuge', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-{{ $gly }}"></span> {{ $submiteButtonText }}</button>
    <a href="{{ url('revendedor') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
</div>