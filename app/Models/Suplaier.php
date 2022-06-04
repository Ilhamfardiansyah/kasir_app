<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplaier extends Model
{
    use HasFactory;
    protected $guarded = [""];
    protected $table = 'suplaiers';

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
