<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Storage::makeDirectory('project_images');
        $title = fake()->text(20);
        $slug = Str::slug($title);
        $img = fake()->image(null, 250, 250);

        // Salviamo le immagini sullo storage e come nome usiamo lo slug
        $img_url = Storage::putFileAs('project_images', $img, "$slug.png");

        $type_ids = Type::pluck('id')->toArray();
        $type_ids[] = null;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraphs(15, true),
            'technologies' => fake()->text(20),
            'type_id' => Arr::random($type_ids),
            'url' => fake()->url(),
            // 'image' => fake()->imageUrl(250, 250, true),
            // 'image' => Storage::putFile(fake()->image(storage_path('app/public/project_images'), 250, 250, true)),
            'image' => $img_url,
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime(),
            'status' => fake()->text(20),
        ];
    }
}
