<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RevendedoraRequest extends Request {

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
			'nome' => 'required|min:3',
            'cpf' => 'required|unique:revendedoras',
            'rg' => 'required',
            'nascimento',
            'telefone' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cep' => 'required',
            'cidade' => 'required',
            'uf' => 'required|min:2'
		];
	}

}
