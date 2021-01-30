<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'url' => 'https://github.com/juanr10'
        ]);

        User::create([
            'name' => 'Juan',
            'email' => 'juan@juan.com',
            'password' => bcrypt('password'),
            'url' => 'https://github.com/juanr10'
        ]);
    }
}
