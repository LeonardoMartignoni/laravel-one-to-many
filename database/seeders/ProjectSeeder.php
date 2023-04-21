<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_project = new Project;
            $new_project->title = $faker->company();
            $new_project->slug = Str::of($new_project->title)->slug('-');
            $new_project->description = $faker->paragraph(20);
            $new_project->type_id = $faker->numberBetween(1, 5);
            $new_project->thumbnail = $faker->imageUrl(640, 480, 'project', true);
            $new_project->save();
        }
    }
}
