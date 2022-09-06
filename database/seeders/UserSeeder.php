<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'id' => Uuid::uuid3(Uuid::NAMESPACE_DNS, 'example.com')->toString(),
                'firstname' => 'Admin',
                'lastname' => 'Conan',
                'email' => 'a@a.a',
                'password' => Hash::make('12345'),
            ]
        ]);
    }
}
