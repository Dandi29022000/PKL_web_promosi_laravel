<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinguistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use SoftDeletes;

    protected $fillable = ['name', 'image'];
}
