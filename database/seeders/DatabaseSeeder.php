<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Produk;
use App\Models\Suplaier;
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
            'name' => 'Ilham Fardiansyah',
            'nik' => '15128447',
            'email' => 'ilhamfardiansyah97@gmail.com',
            'password' => bcrypt('12345'),
            'image' => 'IMG_20200330_155011',
            'level' => 'admin'
        ]);

        Suplaier::create([
            'nama_supplier' => 'PT Megah Jaya',
            'kode_supplier' => '256',
            'alamat' => 'Jl Cibitung',
            'no_telp' => '0212551212'
        ]);

        Produk::create([
            'nama_produk' => 'Kaos Uniqlo',
            'kode_produk' => '258',
            'barcode' => '258',
            'stok' => '25',
            'harga_jual' => '25000',
            'harga_beli' => '40000',
            'total_harga' => '1000000',
            'user_id' => '1',
            'suplaier_id' => '1'
        ]);
    }
}
