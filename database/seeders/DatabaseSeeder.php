<?php

namespace Database\Seeders;

use App\Models\Url;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

         \App\Models\Admin::create([
             'name' => 'Test User',
             'email' => 'admin@admin',
             'password' => bcrypt('asdasdasd'),
             'avatar' => '123'
         ]);

        \App\Models\Store::create([
            'email' => 's@s',
            'password' => bcrypt('asdasdasd'),
        ]);
    }
}
