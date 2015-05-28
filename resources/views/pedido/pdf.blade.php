<h3>Revendedor: {{ $pedido->revendedora->nome }}</h3>
<h4>Data do pedido: {{ $pedido->updated_at->format('d/m/Y') }}</h4>
<?php $i = 0 ?>
<table width="500" cellspacing="10" style="text-align: center;">
    <thead>
    <tr>
        <td width="70"><strong>Código</strong></td>
        <td width="90"><strong>Quantidade</strong></td>
        <td><strong>Item</strong></td>
    </tr>
    </thead>
    <tbody>
    @foreach($pedido->produto as $produto)
        @if(($i % 2) == 0)
            <tr bgcolor="#f0f8ff">
        @else
            <tr>
        @endif

            <td>
                {{ $produto->codigo }}
            </td>
            <td>
                {{ $produto->quantidade() }}
            </td>
            <td>
                {{ $produto->nome }}
            </td>
        </tr>
            <?php $i++ ?>
    @endforeach
    </tbody>
</table>