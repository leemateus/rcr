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
        Profissional::create(['numConselho' => '1',
                              'nome' => 'test',
                              'especialidade_id' => '1',
                              'instituicao_id' => '1']);
    }
}
