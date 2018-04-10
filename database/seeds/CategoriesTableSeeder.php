<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    public function run() {
        $cate = new App\Category;
        $cate->name = 'General';
        $cate->save();

        $admin = App\User::where('access_level','administrator')->first();

        $cate = new App\Category;
        $cate->name = 'Admin Task';
        $cate->assign_to = $admin->id;
        $cate->save();




        factory(App\Category::class, 6)->create();
    }
}
