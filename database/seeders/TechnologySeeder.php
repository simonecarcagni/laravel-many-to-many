<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['JS', 'PHP', 'C', 'MYSQL', 'HTML', 'CSS'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($technology, '-');
            $newTechnology->save();
        };
    }
}
