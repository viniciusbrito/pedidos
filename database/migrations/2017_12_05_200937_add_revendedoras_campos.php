<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRevendedorasCampos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('revendedoras', function(Blueprint $table)
		{
			$table->string('estadoCivil')->after('nome');
			$table->string('sexo')->after('estadoCivil');
			$table->string('email')->after('telefone3');
			$table->boolean('autorizacaoSMS')->default(false)->after('email');
			$table->string('tempoResidencia')->after('uf');
			$table->string('situacaoResidencia')->after('tempoResidencia');

            /**
             * ATENÇÂO
             * Essa parte está totalmente errada e deverá ser refatorado
             */

            $table->string('nomeMae');
            $table->date('nascimentoMae');
            $table->string('nomeConjuge');
            $table->date('nascimentoConjuge');
            $table->string('telefoneConjuge');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('revendedoras', function(Blueprint $table)
		{
			$table->dropColumn('estadoCivil');
			$table->dropColumn('sexo');
			$table->dropColumn('email');
			$table->dropColumn('autorizacaoSMS');
			$table->dropColumn('tempoResidencia');
			$table->dropColumn('situacaoResidencia');
		});
	}

}
