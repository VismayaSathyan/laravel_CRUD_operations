<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(2),
            'price' => 5000,
            'filenames' => $this->faker->file(storage_path('app/public/files')),
            'show_file_name' => 'filename',
        ];
       // id	user_id	name	description	show_file_name	filenames	price	created_at	updated_at	deleted_at

      
    }
}
