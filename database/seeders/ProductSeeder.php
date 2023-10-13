<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
                'name' => 'Product 1',
                'description' => 'Description for Product 1',
                'price' => 19.99,
                'image_path' => '/img/doctor.png',
            ];

        Product::create($products);
    }
}
