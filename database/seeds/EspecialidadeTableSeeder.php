<?php

use Illuminate\Database\Seeder;
use App\Especialidade;

class EspecialidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidade::create(['nome'=>'medico']);
    }
}
