<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostImagesTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ContactTableSeeder::class);

    }
}
