<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model {

	use SoftDeletes;
    protected $fillable = ['revendedora_id', 'status_id', 'campanha_id'];
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function revendedora()
    {
        return $this->belongsTo('App\Revendedora');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function produto()
    {
        return $this->belongsToMany('App\Produto')->withPivot('quantidade');
    }

    public function status()
    {
        return $this->belongsTo('App\PedidoStatus');
    }

    public function campanha()
    {
        return $this->belongsTo('App\Campanha');
    }

    /**
     * Retorna o valor total do pedido
     *
     * @return float
     */
    public function total()
    {
        $soma = 0.0;
        foreach($this->produto as $produto)
        {
            $soma += ($produto->preco * $produto->quantidade());
        }
        return number_format($soma, 2);
    }

    /**
     * Retorna o número de itens de um pedio
     *
     * @return int
     */
    public function itens()
    {
        $soma = 0;
        foreach($this->produto as $produto)
        {
            $soma += $produto->pivot->quantidade;
        }
        return $soma;
    }
}
