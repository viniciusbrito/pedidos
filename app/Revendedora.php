<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revendedora extends Model {

	use SoftDeletes;

    protected $fillable = [
        'codigo',
        'nome',
        'cpf',
        'rg',
        'nascimento',
        'telefone',
        'telefone2',
        'telefone3',
        'endereco',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'ativo'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['nascimento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

}
