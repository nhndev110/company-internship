<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  protected static $password = "123456789";

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => fake()->unique()->name(),
      'email' => fake()->unique()->safeEmail(),
      'username' => fake()->unique()->userName(),
      'password' => Hash::make(static::$password),
      'role_id' => fake()->randomElement(Role::all())->id,
    ];
  }
}
