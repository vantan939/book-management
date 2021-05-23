<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
            	'name' => 'User',
            	'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now()
            ],
            [
            	'name' => 'Admin',
            	'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
