<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'tanggal', 
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sewa_detail(){
        return $this->hasMany(SewaDetail::class, 'sewa_id', 'id');
    }
}
