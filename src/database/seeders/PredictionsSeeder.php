<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredictionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('predictions')->insert([
            'data' => "Longus penis vitae brevis est",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "No vagina no Reda Cohorta",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Femina in vino non curator vagina",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Fallus in frontalus — morte momentalus",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Coito ergo sum",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Per rectum ad astra",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Bardus nuptula causa penis fractura",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Lupus timere — in silvis, non coitae",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Penis longa basis vitae est",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('predictions')->insert([
            'data' => "Dentis fugere — in ore non dare",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
