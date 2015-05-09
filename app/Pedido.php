<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

	//
    public function produto()
    {
        return $this->belongsToMany('App\Produto');
    }
}
