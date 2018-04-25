<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run() {
        //
        $user = new App\User;
        $user->email = 'judge@admin.co.th';
        $user->password = bcrypt('123456');
        $user->first_name = 'Judge';
        $user->last_name = 'Ka';
        $user->address = 'asdasdasdasd';
        $user->birthday = '1997-02-02';
        $user->phone = '0955555555';
        $user->image = 'image';
        $user->type = 'administrator';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        $user = new App\User;
        $user->email = 'poom@com';
        $user->password = bcrypt('123456');
        $user->first_name = 'Poom';
        $user->last_name = 'Ja';
        $user->address = 'asdasdasdasd';
        $user->birthday = '1997-02-02';
        $user->phone = '0955555555';
        $user->image = 'image';
        $user->type = 'administrator';
        $user->is_vertified = true;
        $user->is_enabled = true;
        $user->save();

        factory(App\User::class, 9)->create();

    }
}
