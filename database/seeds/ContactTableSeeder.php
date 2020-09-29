<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();

        for ($i=0; $i < 20; $i++) { 
            Contact::create([
                'name' => "Diego $i",
                'email' => "email_$i@test.com",
                'phone' => "phone_$i",
                'message' => "message_$i",
                'user_id' => 1,
            ]);
        }
    }
}
