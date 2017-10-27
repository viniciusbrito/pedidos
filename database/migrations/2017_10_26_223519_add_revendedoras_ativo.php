<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRevendedorasAtivo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('revendedoras', function(Blueprint $table)
		{
            $table->boolean('ativo')->after('uf')->default(true);
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
            $table->dropColumn('ativo');
		});
	}

}
