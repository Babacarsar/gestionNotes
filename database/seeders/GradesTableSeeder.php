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

            ['name' => 'A', 'mark_from' => 18, 'mark_to' => 20, 'remark' => 'Excellent'],
            ['name' => 'B', 'mark_from' => 15, 'mark_to' => 17.99, 'remark' => 'tres bien'],
            ['name' => 'C', 'mark_from' => 13, 'mark_to' => 14.99, 'remark' => 'bien'],
            ['name' => 'D', 'mark_from' => 10, 'mark_to' => 12.99, 'remark' => 'Passable'],
            ['name' => 'F', 'mark_from' => 0, 'mark_to' => 9.99, 'remark' => 'Insuffisant'],


        ];
        DB::table('grades')->insert($d);
    }
}
