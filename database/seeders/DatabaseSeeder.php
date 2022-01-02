<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
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
        User::create([
            'name' => 'superuser',
            'email' => 'superuser@majoo.com',
            'is_admin' => true,
            'password' => Hash::make('superuser')
        ]);

        User::create([
            'name' => 'Dimas Capella',
            'email' => 'dimas@majoo.com',
            'is_admin' => false,
            'password' => Hash::make('Dimas1590')
        ]);
    }
}
