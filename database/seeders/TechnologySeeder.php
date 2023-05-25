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
        $technologies = ['JS', 'PHP', 'C', 'C++', 'HTML', 'CSS'];

        foreach ($technologies as $technologies) {
            $newTechnology = new Technology();
            $newTechnology->name = $technologies;
            $newTechnology->slug = Str::slug($technologies, '-');
            $newTechnology->save();
        };
    }
}
