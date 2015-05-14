<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PedidoAddProdutoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'produto_id' => 'required|integer|min:1',
            'quantidade' => 'required|integer|min:1'
		];
	}

}
