<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_type')->insert([
            ['name' => 'image'],
            ['name' => 'video'],
            ['name' => '3d-view'],
        ]);
    }
}
