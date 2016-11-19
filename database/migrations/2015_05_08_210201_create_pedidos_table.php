<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('revendedora_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('campanha_id')->unsigned();
			$table->timestamps();
            $table->softDeletes();


            $table->foreign('revendedora_id')
                ->references('id')
                ->on('revendedoras')
                ->onDelete('restrict');

            $table->foreign('status_id')
                ->references('id')
                ->on('pedido_statuses')
                ->onDelete('restrict');

            $table->foreign('campanha_id')
                ->references('id')
                ->on('campanhas')
                ->onDelete('restrict');
        });

        Schema::create('pedido_produto', function(Blueprint $table)
        {
            $table->integer('pedido_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->integer('quantidade');


            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos')
                ->onDelete('restrict');

            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('restrict');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pedido_produto');
        Schema::drop('pedidos');
	}

}
