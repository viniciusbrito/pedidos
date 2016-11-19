<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model {

	//
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

    /**
     * @return mixed
     */
    public function total($filter)
    {
        switch($filter)
        {
            case 'all': return $this->pedidos->count(); break;

            case 'write': return $this->pedidos()->where('status_id', '=', 1)->count(); break;

            case 'close': return $this->pedidos()->where('status_id', '=', 2)->count(); break;
        }
    }

    /**
     * Retorna o valor total da campanha
     * @return float
     */
    public function bruto()
    {
        $soma = 0.0;

        foreach($this->pedidos as $pedido)
        {
            $soma += $pedido->total();
        }

        return number_format($soma,2);
    }

    /**
     * Retorna em string o status da campanha
     * True => Closed
     * False => Writing
     * @return string
     */
    public function status()
    {
        return ($this->status)? 'Finalizado' : 'Em andamento';
    }

    public function verificar()
    {
        $flag = true;
        foreach($this->pedidos as $pedido)
        {
            if($pedido->status_id == 1)
                $flag = false;
        }

        return $flag;
    }

}
