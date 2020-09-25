<?php

use App\Member;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::truncate();

        for ($i=0; $i < 8; $i++) { 
            Member::create([
                'title' => "Member $i",
                'description' => "Member $i",
                'url_clean' => "Member_$i",
                'phone' => "Member_Phone_$i",
                'email' => "Member_Email_$i",
                'posted' => 'yes'
            ]);
        }
    }
}
