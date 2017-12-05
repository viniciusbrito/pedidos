<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Pedidos</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" media="all">
    <style>
        input.form-control {border: 1px solid #000000; font-size: 14px; text-transform: uppercase; color:black; font-weight: bold;}
    </style>

</head>
<body>
<div class="container">

    <?php $i = 0; ?>
    @foreach($revendedores as $revendedor)
        @if($i > 0 && ($i % 2) == 0)
            <div style="page-break-before: always"></div>
        @endif

        @if($i > 0)
            <hr/>
        @endif

        <legend>Dados do(a) canditato(a) a revendedor(a)</legend>
        {!! Form::model($revendedor, ['method' => 'PATCH']) !!}
        <div class="row">
            <div class="col-xs-12">
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
                    {!! Form::input('text', 'nascimento', $revendedor->nascimento->format('d-m-Y'), ['class' => 'form-control input-sm']) !!}
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

        <div class="row">
            <div class="col-xs-3">
                <div class="form-group">
                    {!! Form::label('telefone', 'Telefone') !!}
                    {!! Form::input('tel', 'telefone', null, ['class' => 'form-control input-sm']) !!}
                </div>
            </div>

            <div class="col-xs-3">
                <div class="form-group">
                    {!! Form::label('telefone2', 'Telefone') !!}
                    {!! Form::input('tel', 'telefone2', null, ['class' => 'form-control input-sm']) !!}
                </div>
            </div>

            <div class="col-xs-3">
                <div class="form-group">
                    {!! Form::label('telefone3', 'Telefone') !!}
                    {!! Form::input('tel', 'telefone3', null, ['class' => 'form-control input-sm']) !!}
                </div>
            </div>

            <div class="col-xs-3">
                <div class="form-group">
                    {!! Form::label('cep', 'CEP') !!}
                    {!! Form::text('cep', null, ['class' => 'form-control input-sm']) !!}
                </div>
            </div>
        </div>

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
                    {!! Form::label('uf', 'UF') !!}
                    {!! Form::text('uf', null, ['class' => 'form-control input-sm']) !!}
                </div>
            </div>
            {{--        <div class="col-xs-6">
                        <div class="form-group">
                            {!! Form::label('referencia', 'Ref. do endereço') !!}
                            {!! Form::text('referencia', null, ['class' => 'form-control input-sm']) !!}
                        </div>
                    </div>
            --}}
            <div class="col-xs-2">
                {!! Form::label('situacaoResidencia', 'Situação Residencia') !!}
                <?php
                 $situacaoResidencia = [0 => 'Selecione', 1 => 'Propria (Liquidada)', 2 => 'Propria (Financiada)', 3 => 'Alugada', 4 => 'Pais', 5 => 'Parentes', 6 => 'Outros'];
                ?>
                {!! Form::text('situacaoResidencia', $situacaoResidencia[$revendedor->situacaoResidencia], ['class' => 'form-control input-sm']) !!}
            </div>
            <div class="col-xs-2">
                {!! Form::label('tempoResidencia', 'Tempo de Residencia') !!}
                {!! Form::text('tempoResidencia', null, ['class' => 'form-control input-sm']) !!}
            </div>
            {{--        <div class="col-xs-2">
                        <label for="numeroDependentes">Nº de Dependentes</label>
                        <input type="text" value="" class="form-control input-sm"/>
                    </div>
            --}}
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-10">
                        <strong>E-mail</strong> <small>Autoriza o envio de mensagens por SMS no celular e por e-mail</small>
                    </div>
                    <div class="col-xs-2">
                        {!! Form::checkbox('autorizacaoSMS', $revendedor->autorizacaoSMS, []) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::text('email', null, ['class' => 'form-control input-sm']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                {!! Form::label('nomeMae', 'Nome da Mãe') !!}
                {!! Form::text('nomeMae', null, ['class' => 'form-control input-sm']) !!}
            </div>

            <div class="col-xs-3">
                {!! Form::label('nascimentoMae', 'Data Nascimento da Mãe') !!}
                {!! Form::text('nascimentoMae', $revendedor->nascimentoMae->format('d-m-Y'), ['class' => 'form-control input-sm']) !!}
            </div>
        </div>


        <strong>DADOS DO CÔNJUGE</strong>

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
                    {!! Form::text('nascimentoConjuge', $revendedor->nascimentoConjuge->format('d-m-Y'), ['class' => 'form-control input-sm']) !!}
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    {!! Form::label('telefoneConjuge', 'Telefone') !!}
                    {!! Form::text('telefoneConjuge', null, ['class' => 'form-control input-sm']) !!}
                </div>
            </div>
        </div>

        <div class="row" style="font-size:80%;">
            <div class="col-xs-6">
                <strong>DECLARAÇÃO DE VERACIDADE E RESPONSABILIDADE</strong>
                <p>
                    Declaro que as informações aqui prestadas são a exata expressão de verdade. <br/>
                    Atesto ainda que estou de acordo com o seguinte:
                <ul>
                    <li>deverá ser informada toda e qualquer alteração nos dados aqui fornecidos por mim;</li>
                    <li><b>o não pagamento de meu débito poderá acarretar a inclusão do meu nomeno Serviço de Proteção ao Crédito (SPC);</b></li>
                    <li>Concordo que meu pedido estará sujeito à aprovação de crédito.</li>
                </ul>
                </p>
                <br/><br/>
                _____________________________________________&nbsp;____________&nbsp;de&nbsp;_____________________&nbsp;de&nbsp;___________.
            </div>
            <div class="col-xs-6 text-right">
                <br/><br/><br/><br/><br/><br/><br/>
                _______________________________________________________________________ <br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assinatura do(a) canditato(a) a Revendedor(a)
            </div>
        </div>
        <?php $i++ ?>
        {!! Form::close() !!}
    @endforeach
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
</div>
</body>
</html>