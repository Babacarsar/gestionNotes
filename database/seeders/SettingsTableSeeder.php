<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2022-2023'],
            ['type' => 'system_title', 'description' => 'LP'],
            ['type' => 'system_name', 'description' => 'Le Phare'],
            ['type' => 'term_ends', 'description' => '7/10/2018'],
            ['type' => 'term_begins', 'description' => '7/10/2018'],
            ['type' => 'phone', 'description' => '0123456789'],
            ['type' => 'address', 'description' => 'OUAKAM'],
            ['type' => 'system_email', 'description' => 'lephare@gmail.com'],
            ['type' => 'alt_email', 'description' => ''],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
        ];

        DB::table('settings')->insert($data);

    }
}
