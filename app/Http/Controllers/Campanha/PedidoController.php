<?php namespace App\Http\Controllers\Campanha;

use App\Campanha;
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
use Illuminate\Support\Facades\App;

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
        $qt = 10;
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
                        ->paginate($qt)->appends( Input::query());
                    break;

                case 'create':
                    $pedidos = Pedido::orderBy('created_at', $direc)->paginate($qt)->appends(Input::query());
                    break;

                case 'update':
                    $pedidos = Pedido::orderBy('updated_at', $direc)->paginate($qt)->appends(Input::query());
                    break;

                case 'status':
                    $pedidos = Pedido::orderBy('status_id', $direc)->paginate($qt)->appends(Input::query());
                    break;

                case 'campanha':
                    $pedidos = Pedido::join('campanhas', 'campanhas.id', '=', 'pedidos.campanha_id')
                        ->orderBy('campanhas.created_at', $direc)
                        ->paginate($qt)->appends( Input::query());
                    break;
            }
        }
        else
        {
            $pedidos = Pedido::orderBy('updated_at', 'desc')->paginate($qt)->appends(Input::query());
        }

        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $revendedoras = Revendedora::orderBy('nome')->lists('nome', 'id');
        $campanha = Campanha::find($id);

        if(is_null($campanha))
            return abort(503);

        elseif($campanha->status)
            return abort(503);

        else
            return view('pedido.create')->with([
                'revendedoras' => $revendedoras,
                'campanha_id' => $id
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePedidoRequest $request)
    {
        $id = $request['revendedor_id'];
        $campanha = $request['campanha_id'];

        $revendedor = Revendedora::find($id);

        $pedido = $revendedor->pedidos()->create([
            'revendedora_id' => $id,
            'status_id' => 1,
            'campanha_id' => $campanha
        ]);

        return redirect('campanha/pedido/' . $pedido->id . '/edit');
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

        return redirect('campanha/pedido/' . $pedido->id . '/edit');
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
        return redirect('campanha/pedido/' . $pedido->id . '/edit');
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
        $id = $pedido->campanha->id;

        if (is_null($pedido))
            return view('errors.503');

        //$pedido->produto()->detach();
        $pedido->delete();
        return redirect('campanha/'.$id.'/pedidos/')->with([
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

        if($pedido->itens() == 0)
            return redirect('campanha/pedido/'.$id.'/edit')->with([
                'flash_type_message' => 'alert-danger',
                'flash_message' => 'Pedido vazio não pode ser finalizado!'
            ]);

        $pedido->status_id = 2;
        $pedido->updated_at = Carbon::now();
        $pedido->save();
        return redirect('campanha/pedido/'.$id)->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Pedido finalizado com sucesso!'
        ]);
    }

    public function pdf($id)
    {
        $pedido = Pedido::find($id);

        if (is_null($pedido))
            return view('errors.503');

        $pdf = App::make('dompdf');
        $pdf->loadView('pedido.pdf', ['pedido' => $pedido]);
        return $pdf->save(storage_path().'/pedido.pdf')
            ->stream('pedido.pdf');
    }
}