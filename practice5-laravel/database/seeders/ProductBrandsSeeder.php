<?php

namespace Database\Seeders;

use App\Models\ProductBrands;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBrandsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ProductBrands::factory()->count(5)->create();
  }
}
