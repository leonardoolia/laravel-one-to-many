<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Array di labels 
        $labels = ['Frontend', 'Backend', 'Fullstack', 'UI-UX', 'Design'];

        // Ciclo per girare sulle labels
        foreach ($labels as $label) {
            // Istanza di type
            $type = new Type();

            // Riempiamo i campi
            $type->label = $label;
            $type->color = $faker->hexColor();

            $type->save();
        }
    }
}
