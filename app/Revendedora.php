<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revendedora extends Model {

	use SoftDeletes;

    protected $fillable = [
        'codigo',
        'nome',
        'estadoCivil',
        'sexo',
        'cpf',
        'rg',
        'nascimento',
        'telefone',
        'telefone2',
        'telefone3',
        'email',
        'autorizacaoSMS',
        'endereco',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'tempoResidencia',
        'situacaoResidencia',
        'ativo',

        'nomeMae',
        'nascimentoMae',
        'nomeConjuge',
        'nascimentoConjuge',
        'telefoneConjuge'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['nascimento', 'nascimentoMae', 'nascimentoConjuge'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

    public function mae()
    {
        return $this->hasOne('App\MaeRevendedor');
    }

    public function cojuge()
    {
        return $this->hasOne('App\ConjugeRevendedor');
    }
}
