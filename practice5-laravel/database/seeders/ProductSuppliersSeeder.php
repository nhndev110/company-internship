<?php

namespace Database\Seeders;

use App\Models\ProductSuppliers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSuppliersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ProductSuppliers::factory()->count(10)->create();
  }
}
