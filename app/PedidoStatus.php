<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoStatus extends Model {

	public function Pedido()
    {
        return $this->hasMany('App\Pedido');
    }

}
