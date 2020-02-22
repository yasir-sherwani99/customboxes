<?php

use Illuminate\Database\Seeder;

use App\ProductSpecification;

class ProductSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSpecification::create([
            'id' => 1,
            'product_id' => 1,
        ]);
    }
}
