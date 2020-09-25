<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $categories = [1,2,3,4];

        foreach ($categories as $category) {

            for ($i=0; $i < 4; $i++) { 
                Product::create([
                    'title' => "Producto $i",
                    'url_clean' => "Producto_$i",
                    'short_description' => "Producto_$i",
                    'description' => "Producto_$i",
                    'price' => 15500,
                    'stock' => 0,
                    'member_id' => 1,
                    'type_product_id' => 1,
                    'category_product_id' => $category,
                    'status_product_id' => 1,
                    'posted' => 'yes'
                    
                ]);
            }

            
        }
    }
}
