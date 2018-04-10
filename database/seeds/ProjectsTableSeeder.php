<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder {

    public function run() {
        factory(App\Project::class, 10)->create();
    }
}
