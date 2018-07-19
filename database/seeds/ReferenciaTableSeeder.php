<?php

use Illuminate\Database\Seeder;
use App\Referencia;

class ReferenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Referencia::create(['descricaoCaso' => 'asasasa',
                          'especialidade_id' => '1',
                          'instituicao_id' => '1',
                          'numSus_id' => '1',
                          'numConselho_id' => '1']);
    }
}
