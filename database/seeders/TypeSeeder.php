<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_types = [
            ['name' => 'gioco', 'description' => ' Divertimento strutturato, interattivo.',],
            ['name' => 'applicazione', 'description' => ' Software funzionale su dispositivi.',],
            ['name' => 'sito web', 'description' => 'Pagine collegate online.',],
            ['name' => 'e-commerce', 'description' => 'Commercio online transazionale.',],
        ];
        foreach ($_types as $_type) {
            $type = new Type();
            $type->name = $_type['name'];
            $type->description = $_type['description'];
            $type->save();
        }
    }
}
