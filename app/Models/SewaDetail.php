<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Output\Output;

class SewaDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'permainan_id',
        'sewa_id', 
        'lama_sewa'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function inflatable(){
        return $this->belongsTo(Inflatable::class, 'permainan_id', 'id');
    }

    public function carnival(){
        return $this->belongsTo(Carnival::class, 'permainan_id', 'id');
    }

    public function electrical(){
        return $this->belongsTo(Electrical::class, 'permainan_id', 'id');
    }

    public function entertainment(){
        return $this->belongsTo(Entertainment::class, 'permainan_id', 'id');
    }

    public function funny(){
        return $this->belongsTo(Funny::class, 'permainan_id', 'id');
    }

    public function interactive(){
        return $this->belongsTo(Interactive::class, 'permainan_id', 'id');
    }

    public function outbound(){
        return $this->belongsTo(Outbound::class, 'permainan_id', 'id');
    }

    public function water(){
        return $this->belongsTo(Water::class, 'permainan_id', 'id');
    }

    public function sewa(){
        return $this->belongsTo(Sewa::class, 'sewa_id', 'id');
    }
}
