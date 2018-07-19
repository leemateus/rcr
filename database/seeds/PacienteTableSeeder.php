<?php

use Illuminate\Database\Seeder;
use App\Paciente;

class PacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Paciente::create(['numSus' => '1',
                        'nome' => 'paciente1',
                        'nomeMae' => 'mae1']);
    }
}
