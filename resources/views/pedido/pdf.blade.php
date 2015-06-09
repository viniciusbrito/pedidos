@foreach($campanha->pedidos as $pedido)

    <?php $i = 0 ?>
    <table width="500" cellspacing="10" border="0.1" style="text-align: center; font-size: 14pt;">
        <thead>
        <tr>
            <td colspan="3" style="text-align: left;">
                <strong>Revendedor:</strong> {{ $pedido->revendedora->nome }} <br/>
                <strong>Data do pedido:</strong> {{ $pedido->updated_at->format('d/m/Y') }}
            </td>
        </tr>
        <tr>
            <td width="30"><strong>Qt</strong></td>
            <td width="90"><strong>Código</strong></td>
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
                    {{ $produto->quantidade() }}
                </td>
                <td>
                    {{ $produto->codigo }}
                </td>
                <td>
                    {{ $produto->nome }}
                </td>
            </tr>
                <?php $i++ ?>
        @endforeach
        </tbody>
    </table>
   <!-- <div style="page-break-before: always"></div> -->
@endforeach