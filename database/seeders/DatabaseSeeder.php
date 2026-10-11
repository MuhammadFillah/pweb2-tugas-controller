<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Field;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori Lapangan
        $futsal = Category::create([
            'name' => 'Futsal',
            'description' => 'Lapangan futsal rumput sintetis & interlock'
        ]);

        $badminton = Category::create([
            'name' => 'Badminton',
            'description' => 'Lapangan karpet karpet standar PBSI'
        ]);

        $basket = Category::create([
            'name' => 'Basket',
            'description' => 'Lapangan basket indoor lantai kayu'
        ]);

        // 2. Buat Data Lapangan
        Field::create([
            'category_id' => $futsal->id,
            'field_code' => 'FUT-01',
            'name' => 'Lapangan Futsal A (Sintetis)',
            'status' => 'available'
        ]);

        Field::create([
            'category_id' => $futsal->id,
            'field_code' => 'FUT-02',
            'name' => 'Lapangan Futsal B (Interlock)',
            'status' => 'available'
        ]);

        Field::create([
            'category_id' => $badminton->id,
            'field_code' => 'BAD-01',
            'name' => 'Lapangan Badminton 1',
            'status' => 'available'
        ]);

        Field::create([
            'category_id' => $basket->id,
            'field_code' => 'BSK-01',
            'name' => 'Lapangan Basket Main Court',
            'status' => 'maintenance'
        ]);
    }
}