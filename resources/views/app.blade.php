<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Pedidos</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

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
                            <li><a href="{{ route('revendedor.fichas',0) }}">Gerar Fichas</a></li>
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
{{--                    <li><a href="{{ url('/auth/register') }}">Cadastrar-se</a></li> --}}
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
&copy; <a href="https://viniciusbrito.com">by Vinícius Brito</a>
<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('/js/mask.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/custom.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>
