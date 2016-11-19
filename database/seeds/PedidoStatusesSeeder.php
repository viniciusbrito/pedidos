<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PedidoStatusSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedido_statuses')->insert(['id' => 1, 'status' => 'Em escrita']);
        DB::table('pedido_statuses')->insert(['id' => 2, 'status' => 'Finalizado']);
    }

}
