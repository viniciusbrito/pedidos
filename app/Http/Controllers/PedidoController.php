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
use Illuminate\Support\Facades\Input;

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
        if(Input::get('order'))
        {
            if(Input::get('direc'))
                $direc = Input::get('direc');
            else
                $direc = 'asc';

            $order = Input::get('order');
            switch($order)
            {
                case 'nome':
                    $pedidos = Pedido::join('revendedoras', 'revendedoras.id', '=', 'pedidos.revendedora_id')
                        ->orderBy('revendedoras.nome', $direc)
                        ->paginate(5);
                    break;

                case 'create':
                    $pedidos = Pedido::orderBy('created_at', $direc)->paginate(5);
                    break;

                case 'update':
                    $pedidos = Pedido::orderBy('updated_at', $direc)->paginate(5);
                    break;

                case 'status':
                    $pedidos = Pedido::orderBy('status_id', $direc)->paginate(5);
                    break;
            }
        }
        else
        {
            $pedidos = Pedido::orderBy('updated_at', 'desc')->paginate(5);
        }

        return view('pedido.index')->with(['pedidos' => $pedidos]);
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

        $pedido = $revendedor->pedidos()->create(['revendedora_id' => $id,'status_id' => 1]);

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
        $pedido = Pedido::find($id);

        if (is_null($pedido))
            return view('errors.503');

        return view('pedido.show')->with('pedido', $pedido);
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

        //Pedido finalizado não pode ser editado
        if($pedido->status_id == 2)
            return view('errors.503');

        return view('pedido.edit')->with('pedido', $pedido);
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
        $pedido->updated_at = Carbon::now();
        $pedido->save();

        return redirect('pedido/' . $pedido->id . '/edit');
    }

    /**
     * Remove um produto do pedido.
     *
     * @param  int $id
     * @return Response
     */
    public function remove($id, Request $request)
    {
        $produto_id = $request['produto_id'];
        $pedido = Pedido::find($id);
        $pedido->produto()->detach($produto_id);
        $pedido->updated_at = Carbon::now();
        $pedido->save();
        return redirect('pedido/' . $pedido->id . '/edit');
    }

    /**
     * Remove um pedido.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (is_null($pedido))
            return view('errors.503');

        //$pedido->produto()->detach();
        $pedido->delete();
        return redirect('pedido/')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Pedido removido com sucesso!'
        ]);
    }

    public function close(Request $request)
    {
        $id = $request['id'];
        $pedido = Pedido::find($id);

        if (is_null($pedido))
            return view('errors.503');

        $pedido->status_id = 2;
        $pedido->updated_at = Carbon::now();
        $pedido->save();
        return redirect('pedido/'.$id)->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Pedido finalizado com sucesso!'
        ]);
    }
}
