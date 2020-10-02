<?php

use App\Vendor;
use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::truncate();

        for ($i=0; $i < 8; $i++) { 
            Vendor::create([
                'title' => "Member $i",
                'description' => "Member $i",
                'long_description' => "Member $i",
                'url_clean' => "Member_$i",
                'phone' => "Member_Phone_$i",
                'email' => "Member_Email_$i",
                'address' => "Member_Email_$i",
                'category_id' => 1,
                'city_id' => 1,
                'posted' => 'not'
            ]);
        }
    }
}
