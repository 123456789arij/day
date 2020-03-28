<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new \App\User();
        $admin->name = 'admin';
        $admin->email = 'admin@example.com';
        $admin->password = '$2y$10$zs9Hp.eexI2BvifcyM/R6eCNal9obT00AZxtGHVYQgIihY5WNla4W';
        $admin->role_id = 0;
        $admin->save();
    }
}
