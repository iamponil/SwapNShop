<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommunityFactory>
 */
class CommunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      $faker = \Faker\Factory::create();
        return [
            'name'=>$faker->name,
          'description'=>Str::random(20).' '.Str::random(10),
          'created_at'=> now(),
          'updated_at'=> now(),
          'creator_id'=>1
        ];
    }
}
