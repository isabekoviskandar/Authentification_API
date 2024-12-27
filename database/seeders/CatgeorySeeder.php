<?php

namespace Database\Seeders;

use App\Models\Catgeory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatgeorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catgeory::factory(10)->create();
    }
}
