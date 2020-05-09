<?php

use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("drivers")->insert([
            "driver_name"       => "komaさん",
            "driver_telnumber"  => "09088765543",
            "driver_email"      => "test@test.com",
            "driver_license"    => 234877763,
            "company_id"        => 1,
        ]);
 
        DB::table("drivers")->insert([
            "driver_name"       => "mariさん",
            "driver_telnumber"  => "09088765444",
            "driver_email"      => "test2@test.com",
            "driver_license"    => 77633492,
            "company_id"        => 2,
        ]);
    }
}
