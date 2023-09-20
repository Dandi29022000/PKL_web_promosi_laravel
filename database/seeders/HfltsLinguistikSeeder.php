<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HfltsLinguistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_linguistik' => 1,
                'A'             => 0,
                'B'             => 0,
                'C'             => 0,
                'D'             => 0,
            ],
            [
                'id_linguistik' => 2,
                'A'             => 0,
                'B'             => 0,
                'C'             => 0.17,
                'D'             => 0.33,
            ],
            [
                'id_linguistik' => 3,
                'A'             => 0,
                'B'             => 0.17,
                'C'             => 0.17,
                'D'             => 0.33,
            ],
            [
                'id_linguistik' => 4,
                'A'             => 0,
                'B'             => 0.2,
                'C'             => 1,
                'D'             => 1,
            ],
        ];
        
        DB::table('hflts_linguistiks')->insert($data);
    }
}
