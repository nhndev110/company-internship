<?php

namespace Database\Seeders;

use App\Models\ProductCategories;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ProductCategories::factory()->count(10)->create();
  }
}
