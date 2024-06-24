<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Anwar Fauzi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1sampai8'),
        ]);

        $admin->assignRole('admin');
    }
}
