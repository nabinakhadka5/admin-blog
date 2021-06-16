<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $admin = array(
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt("admin123"),
                'status' => true,
            );
            DB::table('admins')->insert($admin);
        }
    }

