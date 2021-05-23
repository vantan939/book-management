<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            	'email' => 'tannguyen@gmail.com',
            	'password' => bcrypt('abc123'),
            	'firstName' => 'Tan',
                'lastName' => 'Nguyen 1',
                'enabled' => 1,
                'avatar' => '',
                'role_id' => 1,
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
            	'email' => 'admin@gmail.com',
                'password' => bcrypt('abc123'),
                'firstName' => 'Tan',
                'lastName' => 'Nguyen 2',
                'enabled' => 1,
                'avatar' => '',
                'role_id' => 2,
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
