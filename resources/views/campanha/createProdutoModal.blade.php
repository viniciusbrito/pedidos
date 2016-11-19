

<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Body -->
            <div class="modal-body">

                {!! Form::open(['route' => 'produto.store', 'method' => 'POST', 'id' => 'create_produto']) !!}

                <legend><span class="glyphicon glyphicon-edit"></span> Cadastrar Novo Produto</legend>

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
                    {!! Form::text('preco', null, ['type' => 'tel', 'class' => 'form-control', 'placeholder' => 'Somente número']) !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Cadastrar Novo</button>
                    <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
