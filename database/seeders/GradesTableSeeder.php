<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        $this->createGrades();
    }

    protected function createGrades()
    {

        $d = [

            ['name' => 'A', 'mark_from' => 20, 'mark_to' => 20, 'remark' => 'Excellent'],
            ['name' => 'B', 'mark_from' => 16, 'mark_to' => 19, 'remark' => 'très bien'],
            ['name' => 'C', 'mark_from' => 13, 'mark_to' => 15, 'remark' => 'bien'],
            ['name' => 'D', 'mark_from' => 11, 'mark_to' => 12, 'remark' => 'Abien'],
            ['name' => 'E', 'mark_from' => 6, 'mark_to' => 10, 'remark' => 'Passable'],
            ['name' => 'F', 'mark_from' => 0, 'mark_to' => 5, 'remark' => 'insuffisant'],


        ];
        DB::table('grades')->insert($d);
    }
}
