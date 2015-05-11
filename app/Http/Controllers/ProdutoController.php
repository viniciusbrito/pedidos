<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Produto;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::guest())
        {
            //return redirect('/produto');
        }
        $produtos = Produto::all();
        return view('produto.all')->with('produtos', $produtos);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        if(is_null($produto))
            return view('errors.503');

        return view('produto.show')->with('produto', $produto);
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(CreateProdutoRequest $request)
    {
        Produto::create($request->all());
        return redirect('produto');

    }

    public function edit($id)
    {
        $produto = Produto::find($id);

        if(is_null($produto))
            return view('errors.503');

        return view('produto.edit')->with('produto', $produto);

    }

    public function update($id, UpdateProdutoRequest $request)
    {
        $produto = Produto::find($id);

        if(is_null($produto))
            return view('errors.503');

        $produto->update($request->all());

        return redirect('produto');

    }

    public function delete($id)
    {
        Produto::destroy($id);
        return redirect('produto');

    }
}
