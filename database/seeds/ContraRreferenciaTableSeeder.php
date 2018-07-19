<?php

use Illuminate\Database\Seeder;
use App\ContraRreferencia;

class ContraRreferenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContraRreferencia::create(['condutaAdotada' => 'asasas',
                                    'diagnostico' => 'asasas',
                                    'referencia_id' => '1']);
    }
}
