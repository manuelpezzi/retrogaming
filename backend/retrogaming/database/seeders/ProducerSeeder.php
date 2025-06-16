<?php

namespace Database\Seeders;

use App\Models\Producer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $producers = [
        ['name' =>'Konami'],
        ['name' =>'Nintendo'],
        ['name' =>'Sony'],
        ['name' =>'Capcom'],
        ['name' =>'Square Enix'],
    ];
    foreach ($producers as $producer) {
        Producer::create($producer);
        }
   }
}