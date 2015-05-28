<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Pedidos</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-ex1-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>

        @if(!Auth::guest())
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Revendedor <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('revendedor') }}">Consultar</a></li>
                            <li><a href="{{ url('revendedor/create') }}">Criar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produtos <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('produto') }}">Consultar</a></li>
                            <li><a href="{{ url('produto/create') }}">Cadastrar Produto</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Campanhas <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('campanha') }}">Consultar</a></li>
                            <!--<li><a href="{{ url('pedido/create') }}">Criar</a></li>-->
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" role="menuitem">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">Sua Conta <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Editar</a></li>
                            <li><a href="{{ url('auth/logout') }}">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        @else
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/auth/login') }}">Entrar</a></li>
                    <li><a href="{{ url('/auth/register') }}">Cadastrar-se</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        @endif
    </div>
</nav>

<div class="container" style="padding-top:100px;">
    @if(Session::has('flash_message'))
        <div class="alert {{ Session::get('flash_type_message') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{session('flash_message')}}</strong>
        </div>
    @endif
    @yield('content')
</div>

<br/>
<hr>
&copy; <a href="#">vfb Desenvolvimento</a>
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $("#input_produto").keyup(function(event){

        $('#list_produto').empty();

        if($(this).val().length < 1) {
            $('#produto_id').val(0);
            return false;
        }

        $('#search_produto').submit();
    });

    $('#search_produto').on('submit', function(event){
        event.preventDefault();

        var $form = $(this),
                key = $form.find("input[name='key']").val(),
                token = $form.find("input[name='_token']").val(),
                url = $form.attr("action");

        $.ajax({
            url:url,
            type:'post',
            dataType:'json',
            success: function (data) {
                for($i = 0; $i < data.length; $i++)
                {
                    $('#list_produto').append('<a href="#'+data[$i].id+'" class="list-group-item produto"><span class="glyphicon glyphicon-plus"></span> '+
                        data[$i].codigo +' - '+
                        data[$i].nome +' - R$ '+
                        data[$i].preco +
                        "</a>");
                }
            },
            data: {key:key, _token:token}
        });
    });

    $("body").on("click", "a.list-group-item.produto", function(event){
        event.preventDefault();
        var id = $(this).attr('href').split("#")[1];
        var text = $(this).text();
        $('#input_produto').val(text);
        $('#produto_id').val(id);
        $('#list_produto').empty();
        $('#quantidade').focus();
    });

    /*REVENDEDOR==================================================================================================================== */

    $("#input_revendedor").keyup(function(event){

        $('#list_revendedor').empty();

        if($(this).val().length < 1) {
            $('#revendedor_id').val(0);
            return false;
        }

        $('#search_revendedor').submit();
    });


    $('#search_revendedor').submit(function(event){
        event.preventDefault();

        $('#list_revenderora').empty();

        var $form = $(this),
                key = $form.find("input[name='key']").val(),
                token = $form.find("input[name='_token']").val(),
                url = $form.attr("action");

        $.ajax({
            url:url,
            type:'post',
            dataType:'json',
            success: function (data) {
                for($i = 0; $i < data.length; $i++)
                {
                    $('#list_revendedor').append('<a href="#'+data[$i].id+'" class="list-group-item revendedor"><span class="glyphicon glyphicon-plus"></span> '+data[$i].nome +'</a>');
                }
            },
            data: {key:key, _token:token}
        });
    });

    $("body").on("click", "a.revendedor", function(event){
        event.preventDefault();
        var id = $(this).attr('href').split("#")[1];
        var text = $(this).text();
        $('#input_revendedor').val(text);
        $('#revendedor_id').val(id);
        $('#list_revendedor').empty();
    });
</script>

</body>
</html>