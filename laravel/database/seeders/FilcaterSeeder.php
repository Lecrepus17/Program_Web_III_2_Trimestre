<?php

namespace Database\Seeders;

use App\Models\Filcater;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilcaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filcater::create([
            'filme_fk' => '1',
            'categoria_fk' => '1'
        ]);Filcater::create([
            'filme_fk' => '2',
            'categoria_fk' => '2'
        ]);
    }
}
