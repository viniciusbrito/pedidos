<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProdutoController extends Controller {

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return $this
     */
    public function index()
    {
        if(Auth::guest())
        {
            //return redirect('/produto');
        }
        $produtos = Produto::orderBy('nome')->paginate(5);
        return view('produto.all')->with('produtos', $produtos);
    }

    /**
     * @param $id
     * @return $this|\Illuminate\View\View
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        if(is_null($produto))
            return view('errors.503');

        return view('produto.show')->with('produto', $produto);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * @param CreateProdutoRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProdutoRequest $request)
    {
        Produto::create($request->all());
        return redirect('produto')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Produto cadastrado com sucesso!'
        ]);

    }

    /**
     * @param $id
     * @return $this|\Illuminate\View\View
     */
    public function edit($id)
    {
        $produto = Produto::find($id);

        if(is_null($produto))
            return view('errors.503');

        return view('produto.edit')->with('produto', $produto);

    }

    /**
     * @param $id
     * @param UpdateProdutoRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function update($id, UpdateProdutoRequest $request)
    {
        $produto = Produto::find($id);

        if(is_null($produto))
            return view('errors.503');

        $produto->update($request->all());

        return redirect('produto')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Produto atualizado com sucesso!'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(is_null($produto))
            return view('errors.503');

        $produto->delete();

        return redirect('produto')->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Produto removido com sucesso!'
        ]);;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $key = $request->key;

        $produto = Produto::where('codigo', 'like', '%'.$key.'%')->take(5)->get()->toJSon();

        return $produto;
    }
}
