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
        return view('revendedora.all')->with('revendedores', Revendedora::orderBy('nome')->paginate(5));
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
		Revendedora::create($request->all());

        return redirect('revendedor')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Usuário cadastrado com sucesso!'
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
		$revendedor = Revendedora::find($id);

        if(is_null($revendedor))
            return view('errors.503');

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
        $revendedor = Revendedora::find($id);

        if(is_null($revendedor))
            return view('errors.503');

        return view('revendedora.edit')->with('revendedor',$revendedor);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, RevendedoraRequest $request)
	{
        $revendedor = Revendedora::find($id);

        if(is_null($revendedor))
            return view('errors.503');

        $revendedor->update($request->all());

        return redirect('revendedor')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Usuário atualizado com sucesso!'
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
		Revendedora::destroy($id);
        return redirect('revendedor');
	}


    public function search(Request $request)
    {
        $key = $request->key;

        $revendedor  = Revendedora::where('nome', 'like', '%'.$key.'%')->get()->toJson();

        return $revendedor;
    }
}
