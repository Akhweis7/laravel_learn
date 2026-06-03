<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Phone',
                'description' => 'A smartphone',
                'price' => 999.99,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop',
                'description' => 'A gaming laptop',
                'price' => 1999.99,
                'stock' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tablet',
                'description' => 'An iPad',
                'price' => 499.99,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
