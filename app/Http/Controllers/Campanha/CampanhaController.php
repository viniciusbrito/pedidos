<?php namespace App\Http\Controllers\Campanha;

use App\Campanha;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;

use App\Http\Requests\SendCampanhaRequest;

class CampanhaController extends Controller {


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
		return view('campanha.index')->with('campanhas', Campanha::orderBy('created_at', 'desc')->paginate(5));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $campanha = new Campanha;
        $campanha->save();
        return redirect('campanha/'.$campanha->id.'/pedido/create');
	}

    /**
     * @param $id
     * @return $this|\Illuminate\View\View
     */
    public function pedidos($id)
    {
        $campanha = Campanha::find($id);

        if(is_null($campanha))
            return view('errors.503');

        /*Ordenação da tabela*/
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
                    $pedidos = $campanha->pedidos()->join('revendedoras', 'revendedoras.id', '=', 'pedidos.revendedora_id')
                        ->orderBy('revendedoras.nome', $direc)
                        ->paginate(5)->appends( Input::query());
                    break;

                case 'create':
                    $pedidos = $campanha->pedidos()->orderBy('created_at', $direc)->paginate(5)->appends(Input::query());
                    break;

                case 'update':
                    $pedidos = $campanha->pedidos()->orderBy('updated_at', $direc)->paginate(5)->appends(Input::query());
                    break;

                case 'status':
                    $pedidos = $campanha->pedidos()->orderBy('status_id', $direc)->paginate(5)->appends(Input::query());
                    break;
            }
        }
        else
        {
            $pedidos = $campanha->pedidos()->orderBy('updated_at', 'desc')->paginate(5)->appends(Input::query());
        }
        return view('campanha.pedidos')->with(['pedidos' => $pedidos, 'campanha' => $campanha]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update($id)
    {
        $campanha = Campanha::find($id);

        if(is_null($campanha))
            return abort(503);

        $pedidos = $campanha->pedidos()->orderBy('updated_at', 'desc')->paginate(5)->appends(Input::query());

        if($campanha->verificar() == false)
        {
            return redirect(route('campanha.pedidos', $campanha->id))
                ->with([
                    'pedidos' => $pedidos,
                    'campanha' => $campanha,
                    'flash_message' => 'Pedido não pode ser finalizado! Ainda há pedidos em escrita!',
                    'flash_type_message' => 'alert-danger'
                ]);
        }
        else
        {
            $campanha->status = true;
            $campanha->save();
            return redirect(route('campanha.pedidos', $campanha->id))
                ->with([
                    'pedidos' => $pedidos,
                    'campanha' => $campanha,
                    'flash_message' => 'Pedido Finalizado com sucesso!',
                    'flash_type_message' => 'alert-success'
                ]);
        }
    }

    /**
     * Send to email a file pdf with all Pedidos
     * @param $id
     * @param SendCampanhaRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function send($id, SendCampanhaRequest $request)
    {
        $campanha = Campanha::find($id);

        if(is_null($campanha))
            return abort(504);

        /* Cria o arquivo pdf em storage/campanha/file_name */

        $fileName = str_random(15).'_Campanha_'.$campanha->created_at->format('M').'.pdf';
        $path = storage_path().'/campanhas/'.$fileName;
        $pdf = App::make('dompdf');
        $pdf->loadView('pedido.pdf', ['campanha' => $campanha]);
        $pdf->save($path);

        /* Envia o e-mail */
        $dados['email'] = $request->email;
        $dados['path'] = $path;
        Mail::raw('Segue em anexo os pedidos', function($message) use ($dados)
        {
            $message->to($dados['email'])->cc('luciafernandesoliveira@hotmail.com');

            $message->subject("Pedidos " . Carbon::now()->format('d/m/Y'));

            $message->attach($dados['path']);
        });

        $campanha->sent = true;
        $campanha->save();

        return redirect(route('campanha.pedidos', $id))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Email enviado com sucesso!'
        ]);
    }

}