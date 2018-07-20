<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EspecialidadeTableSeeder::class);
        $this->call(InstituicaoTableSeeder::class);
        $this->call(ProfissionalTableSeeder::class);
        // $this->call(PacienteTableSeeder::class);
        // $this->call(ReferenciaTableSeeder::class);
        // $this->call(ContraRreferenciaTableSeeder::class);
    }
}
