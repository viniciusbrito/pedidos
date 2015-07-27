<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevendedorasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revendedoras', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('codigo');
            $table->string('nome', 200);
            $table->string('cpf', 15);
            $table->string('rg', 15);
            $table->date('nascimento');
            $table->string('telefone', 16);
            $table->string('telefone2', 16);
            $table->string('telefone3', 16);
            $table->string('endereco', 150);
            $table->string('bairro', 150);
            $table->string('cep', 9);
            $table->string('cidade', 150);
            $table->char('uf', 2);
			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('revendedoras');
	}

}
