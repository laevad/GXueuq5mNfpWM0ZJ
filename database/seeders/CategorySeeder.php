<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => Uuid::uuid3(Uuid::NAMESPACE_DNS, 'example.com')->toString(),
                'name' => 'Main Dish',
            ],
            [
                'id' => Uuid::uuid3(Uuid::NAMESPACE_DNS, 'example1.com')->toString(),
                'name' => 'Appetizer',
            ]
        ]);
    }
}
