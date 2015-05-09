<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model {

	Use SoftDeletes;

    protected $fillable = [
        'codigo',
        'nome',
        'descricao',
        'preco'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pedido()
    {
        return $this->belongsToMany('App\Pedido');
    }
}
