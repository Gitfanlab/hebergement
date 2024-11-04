<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create([
            'nom' => 'OFF_SUP',
        ]);

        Grade::create([
            'nom' => 'OFF_SUB',
        ]);

        Grade::create([
            'nom' => 'OMS',
        ]);

        Grade::create([
            'nom' => 'OM',
        ]);

        Grade::create([
            'nom' => 'EQ',
        ]);

        Grade::create([
            'nom' => 'EXTERNE MILITAIRE',
        ]);

        Grade::create([
            'nom' => 'EXTERNE CIVIL',
        ]);
    }
}
