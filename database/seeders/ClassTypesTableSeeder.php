<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'College', 'code' => 'C'],
            ['name' => 'Lycée', 'code' => 'L'],
        ];

        DB::table('class_types')->insert($data);

    }
}
