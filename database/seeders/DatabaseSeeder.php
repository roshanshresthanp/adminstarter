<?php

namespace Database\Seeders;

use App\Models\MissionMessages;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProvinceTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(MenuSeeder::class);

        Setting::updateOrCreate(['id'=>1],[
                "company_name" => "Company Name",
                "email" => "company@gmail.com ",
                "contact_no" => "01-5547922",
                "phone" => "98596658",
                "province_no" => "3",
                "district_no" => "23",
                "local_address" => "Tinkune",
                "pan_vat" => "1632-591-521",
                "total_learner" => "50",
                "total_nationality" => "28",
                "total_activity" => "122",
                "map_url" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.9212530847535!2d85.30833201458272!3d27.68882863291339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1918e77a958d%3A0x8adb3649babf6b7e!2sNectar%20Digit%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1630559019802!5m2!1sen!2snp"
        ]
    );


        User::updateOrCreate(
            ['id'=>1],
            
            [
                "id"=>1,
                "name"=>"Super Admin",
                "email"=>"admin@gmail.com",
                "password"=>Hash::make("password"),
                "created_at"=>date('Y-m-d H:i:s'),
                "updated_at"=>date('Y-m-d H:i:s'),
            
        ]);
    }
}
