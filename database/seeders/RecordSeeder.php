<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()->count(20)->create();
    }
}
