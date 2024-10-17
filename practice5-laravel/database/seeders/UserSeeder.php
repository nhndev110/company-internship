<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  protected static $password = "123456789";

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Nhan Nguyen Hoang',
      'email' => 'nhndev110@gmail.com',
      'username' => "nhndev110",
      'password' => Hash::make(static::$password),
      'role_id' => 1,
    ]);
    User::factory()->count(10)->create();
  }
}
