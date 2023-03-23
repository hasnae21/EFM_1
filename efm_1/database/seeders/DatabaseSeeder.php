<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for($i = 0; $i < 10; $i ++){
            DB::table('c_a_n_d_i_d_a_t_s')->insert([
                'email' => Str::random(5).'@gmail.com',
                "idée" => Str::random(50)
            ]);
        }

    }
}
