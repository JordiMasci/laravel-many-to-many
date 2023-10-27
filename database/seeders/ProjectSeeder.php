<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types_id = Type::all()->pluck('id')->toArray();
        

        for ($i = 0; $i < 100; $i++) {
            $post = new Project();
            $post->type_id= $faker->randomElement($types_id);
            $post->title = $faker->catchPhrase();
            $post->content = $faker->paragraph(3, true);
            $post->slug = Str::slug($post->title);
            $post->save();
        }
    }
}
