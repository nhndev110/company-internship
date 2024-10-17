<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSuppliers>
 */
class ProductSuppliersFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $company = fake()->company();
    return [
      'name' => $company,
      'contact_name' => $company,
      'province' => fake()->city(),
      'address' => fake()->address(),
      'email' => fake()->unique()->email(),
      'phone' => fake()->unique()->e164PhoneNumber()
    ];
  }
}
