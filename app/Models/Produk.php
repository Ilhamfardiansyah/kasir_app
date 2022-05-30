<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suplaier;


class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function suplaier(){
        return $this->belongsTo(Suplaier::class);
    }
}
