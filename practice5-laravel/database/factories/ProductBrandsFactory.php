<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductBrandsFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $image_random = fake()->numberBetween(10, 100);
    $image = "https://picsum.photos/id/{$image_random}/200/200";
    return [
      'name' => fake()->company(),
      'logo' => $image,
      'description' => fake()->catchPhrase(),
      'website' => fake()->url()
    ];
  }
}
