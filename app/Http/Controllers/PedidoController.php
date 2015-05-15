<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pedido;
use App\Produto;
use App\Revendedora;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\PedidoAddProdutoRequest;
use App\Http\Requests\CreatePedidoRequest;

class PedidoController extends Controller
{


    /**
     *
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('created_at', 'desc')->paginate(5);

        return view('pedido.index', compact('pedidos', $pedidos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $revendedoras = Revendedora::orderBy('nome')->lists('nome', 'id');

        return view('pedido.create', compact('revendedoras', $revendedoras));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePedidoRequest $request)
    {
        $id = $request->all();

        $revendedor = Revendedora::find($id['revendedor_id']);

        $pedido = $revendedor->pedidos()->create($id);

        return redirect('pedido/' . $pedido->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        //dd($pedido->produto);

        if (is_null($pedido))
            return view('errors.503');

        $produtos = Produto::orderBy('nome')->lists('nome', 'id');

        return view('pedido.edit')->with(['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, PedidoAddProdutoRequest $request)
    {
        $pedido = Pedido::find($id);
        $produto_id = $request->produto_id;
        $quantidade = $request->quantidade;

        if (is_null($pedido))
            return view('errors.503');

        $pedido->produto()->attach([$produto_id], ['quantidade' => $quantidade]);

        return redirect('pedido/' . $pedido->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $produto_id = $request['produto_id'];
        $pedido = Pedido::find($id);
        $pedido->produto()->detach($produto_id);
        return redirect('pedido/' . $pedido->id . '/edit');
    }
}
