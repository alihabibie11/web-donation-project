<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('users')->insert([
        //     'name' => 'Muhammad Fatih, S.Pd',
        //     'email' => 'test_admin@gmail.com',
        //     'roles' => 'ADMIN',
        //     'password' => Hash::make('password12345')
        // ]);
        DB::table('users')->insert(
            // [
            //     'name' => 'Ahmad Riyadh, S.M',
            //     'email' => 'test_user@gmail.com',
            //     'password' => Hash::make('password12345')
            // ],
            [
                'name' => 'Super Admin',
                'email' => 'super_admin@gmail.com',
                'roles' => 'SUPER-ADMIN',
                'password' => Hash::make('password12345')
            ]
        );
    }
}
