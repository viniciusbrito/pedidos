<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutosSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'codigo' => 'COD001',
            'nome' => 'Produto 1',
            'descricao' => 'Drecrição do produto 1',
            'preco' => '1.1'
        ]);

        Produto::create([
            'codigo' => 'COD002',
            'nome' => 'Produto 2',
            'descricao' => 'Drecrição do produto 2',
            'preco' => '1.2'
        ]);

        Produto::create([
            'codigo' => 'COD003',
            'nome' => 'Produto 3',
            'descricao' => 'Drecrição do produto 3',
            'preco' => '1.3'
        ]);

        Produto::create([
            'codigo' => 'COD004',
            'nome' => 'Produto 4',
            'descricao' => 'Drecrição do produto 4',
            'preco' => '1.4'
        ]);

        Produto::create([
            'codigo' => 'COD005',
            'nome' => 'Produto 5',
            'descricao' => 'Drecrição do produto 5',
            'preco' => '1.5'
        ]);
    }
}