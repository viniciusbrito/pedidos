<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Revendedora;
use Illuminate\Http\Request;
use App\Http\Requests\RevendedoraRequest;

class RevendedoraController extends Controller {


    public function __construct()
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
        return view('revendedora.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('revendedora.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RevendedoraRequest $request)
	{
        $rev = Revendedora::create($request->all());

        return redirect(route('revendedor.show', $rev->id))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Revendedor cadastrado com sucesso!'
        ]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$revendedor = Revendedora::findOrFail($id);

        return view('revendedora.show')->with('revendedor', $revendedor);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $revendedor = Revendedora::findOrFail($id);

        return view('revendedora.edit')->with('revendedor',$revendedor);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $revendedor = Revendedora::findOrFail($id);

        $revendedor->update($request->all());

        return redirect(route('revendedor.show', $revendedor->id))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Revendedor atualizado com sucesso!'
        ]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $revendedor = Revendedora::findOrFail($id);

        $revendedor->pedidos()->delete();
        $revendedor->delete();

        return redirect('revendedor')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Revendedor removido com sucesso!'
        ]);
	}


    public function search(Request $request)
    {
        $key = $request->key;

        $revendedor  = Revendedora::where('nome', 'like', '%'.$key.'%')->orderBy('nome')->get()->toJson();

        return $revendedor;
    }

    public function all()
    {
        return Revendedora::orderBy('nome', 'asc')->get()->toJson();
    }
}
