<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suplaier;


class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'Produks';

    public function suplaier(){
        return $this->belongsTo(Suplaier::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function rak(){
        return $this->belongsTo(Rak::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }

}
