<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'gambar'
    ];

    public function sewa_detail(){
        return $this->hasMany(SewaDetail::class, 'permainan_id', 'id');
    }
}
