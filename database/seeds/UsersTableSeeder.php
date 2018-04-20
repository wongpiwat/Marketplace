<?php

use Illuminate\Database\Seeder;



class UsersTableSeeder extends Seeder {

    public function run() {
<<<<<<< HEAD
      
        // $users=factory(App\User::class,5)->make();  

        $admin = new App\User;
        $admin->username = 'admin';
        $admin->first_name ="first";
        $admin->last_name ="last";
        $admin->password = bcrypt('adminpassword');
        $admin->email = 'admin@example.com';
        $admin->address = '34/34 Kasetsart';
        $admin->birthday="19/03/1988";
        $admin->phone='083943756';
        $admin->image="admin.png";
        $admin->type="administrator";
        $admin->is_enabled = true;
        $admin->remember_token='123';
        $admin->save();

        $user1 = new App\User;
        $user1->username = 'Sunut';
        $user1->first_name ="supanut";
        $user1->last_name ="thiensuwan";
        $user1->password = bcrypt('nutpassword');
        $user1->email = 'nut@example.com';
        $user1->address = '19/9 Lopburi 15000';
        $user1->birthday="02/08/1996";
        $user1->phone='0848374927';
        $user1->image="nut.png";
        $user1->type="seller";
        $user1->is_enabled = true;
        $user1->remember_token='123';
        $user1->save();


        $user2 = new App\User;
        $user2->username = 'Lek';
        $user2->first_name ="greasy";
        $user2->last_name ="cafeNu";
        $user2->password = bcrypt('lekpassword');
        $user2->email = 'lek@example.com';
        $user2->address = '120 Changmai';
        $user2->birthday="22/01/1990";
        $user2->phone='0817809834';
        $user2->image="lek.png";
        $user2->type="organizer";
        $user2->is_enabled = true;
        $user2->remember_token='123';
        $user2->save();



        // factory(App\User::class,1)->create();    
=======

       factory(App\User::class,5)->create();

>>>>>>> fe16a7011818d0e5e149b49b8a885ecba64bd123
    }
}




// <?php

// use Faker\Generator as Faker;

// $factory->define(App\User::class, function (Faker $faker) {
//     $faker = Faker\Factory::create();
//     return [
//         'username' => $faker->userName,
//         'first_name' => $faker->word,
//         'last_name' => $faker->word,
//         'password' => bcrypt('secret'), // secret
//         'email' => $faker->unique()->safeEmail,
//         'birthday' =>$faker->dateTimeThisCentury->format('Y-m-d'),
//         'phone' => $faker->phoneNumber,
//         'image' => $faker->word,
//         'address' => $faker->word,      
//         'remember_token' => null,
//         'type' => $faker->randomElement(['seller','organizer','administrator']),
//         'is_enabled' => $faker->boolean(90)
//     ];  
// });



