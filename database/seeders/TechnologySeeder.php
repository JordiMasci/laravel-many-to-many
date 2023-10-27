<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $_technologie = [
            ['name' => 'HTML', 'description' => ' Linguaggio di markup strutturale.',],
            ['name' => 'CSS', 'description' => ' Foglio di stile per presentazione.',],
            ['name' => 'Javascript', 'description' => 'Linguaggio di scripting client-side.',],
            ['name' => 'VueJs', 'description' => 'Framework JavaScript per interfacce utente.',],
            ['name' => 'Php', 'description' => ' Linguaggio di scripting server-side.',],
            ['name' => 'Laravel', 'description' => 'Framework PHP per lo sviluppo web.',],
        ];
        foreach ($_technologie as $_technology) {
            $type = new Technology();
            $type->name = $_technology['name'];
            $type->description = $_technology['description'];
            $type->save();
        }

    }
}
