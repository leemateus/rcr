<?php

use Illuminate\Database\Seeder;
use App\Instituicao;

class InstituicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Instituicao::create(['nome' => 'CRAS']);
    }
}
