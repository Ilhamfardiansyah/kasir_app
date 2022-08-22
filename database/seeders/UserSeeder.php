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
            'name' => 'Ilham Fardiansyah',
            'nik' => '15128447',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'user-1.jpg'
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'ahmad zakaria',
            'nik' => '15128448',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'user-2.jpg'
        ]);
        $user->assignRole('kasir');

         $user = User::create([
            'name' => 'Herman',
            'nik' => '15128446',
            'email' => 'gudang@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'user-3.jpg'
        ]);
        $user->assignRole('kepala gudang');

         $user = User::create([
            'name' => 'Rima Mariska',
            'nik' => '15128445',
            'email' => 'finance@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'user-4.jpg'
        ]);
        $user->assignRole('finance');

    }
}
