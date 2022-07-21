<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'ilham fardiansyah',
            'nik' => '15128447',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'image' => '2c8e3a4e1d7311d7fbd7fd4cef5871eb.jpg'
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'ahmad zakaria',
            'nik' => '15128448',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'user2-160x160'
        ]);
        $user->assignRole('kasir');

    }
}
