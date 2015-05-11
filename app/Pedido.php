<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model {

	use SoftDeletes;

    public function produto()
    {
        return $this->belongsToMany('App\Produto');
    }
}
