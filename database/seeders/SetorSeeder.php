<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setors')->insert([

            [
                'nome' => 'Tecnologia da Informação',
            ],
            [
                'nome' => 'Comunicação',
            ],
            [
                'nome' => 'Editoração',
            ],
            [
                'nome' => 'Educação Básica',
            ],
            [
                'nome' => 'Ensino Superior',
            ],

        ]);
    }
}
