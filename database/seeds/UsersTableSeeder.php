<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
<<<<<<< HEAD
        // $admin = new App\User;
        // $admin->username = 'admin';
        // $admin->password = bcrypt('adminpassword');
        // $admin->name = 'Administrator';
        // $admin->email = 'admin@example.com';
        // $admin->access_level = 'administrator';
        // $admin->is_enabled = true;
        // $admin->save();
        $users = factory(App\User::class,10)->create();
=======
        $admin = new App\User;
        $admin->username = 'admin';
        $admin->password = bcrypt('adminpassword');
        $admin->name = 'Administrator';
        $admin->email = 'admin@example.com';
        $admin->access_level = 'administrator';
        $admin->is_enabled = true;
        $admin->save();
        $users = factory(App\User::class,5)->create();
>>>>>>> 8038762fc81961f9947c8b4f8b74f600ea4284c7
    }
}
