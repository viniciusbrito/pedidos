<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model {

	use SoftDeletes;

    protected $fillable = [
        'codigo',
        'nome',
        'descricao',
        'preco'
    ];

    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pedido()
    {
        return $this->belongsToMany('App\Pedido');
    }

    /**
     * Retorna a quantidade de um produto no pedido
     * @return mixed
     */
    public function quantidade()
    {
        return $this->pivot->quantidade;
    }

    public function ahpagar()
    {
        return $this->preco * $this->quantidade();
    }
}
