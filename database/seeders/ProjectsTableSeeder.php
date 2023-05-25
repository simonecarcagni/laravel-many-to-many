<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->sentence(4);
            $newProject->description = $faker->text(250);
            $newProject->link = $faker->sentence(5);
            $newProject->project_date = $faker->date('Y_m_d');
            $newProject->image = $faker->sentence(5);
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->save();
        }
    }
}
