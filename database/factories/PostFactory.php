<?php

namespace Database\Factories;

use auth;
use App\Models\Post;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Ramsey\Uuid\Exception\RandomSourceException;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
          'description'=> $this->faker->paragraph(),
          'active'=> $this->faker->boolean(),
       
       
        
        ];
    }
    
}
