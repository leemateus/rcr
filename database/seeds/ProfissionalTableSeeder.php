<?php

use Illuminate\Database\Seeder;
use App\Profissional;

class ProfissionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profissional::create(['numConselho' => '2',
                              'nome' => 'test2',
                              'especialidade_id' => '2',
                              'instituicao_id' => '2']);
    }
}
