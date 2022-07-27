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
                "company_name" => "DAV College",
                "email" => "dav@gmail.com ",
                "contact_no" => "01-5904030",
                "phone" => "9841682658",
                "province_no" => "3",
                "district_no" => "23",
                "local_address" => "Sundhara",
                "pan_vat" => "1542-551-575",
                "total_learner" => "50",
                "total_nationality" => "28",
                "total_activity" => "122",
                "map_url" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.9212530847535!2d85.30833201458272!3d27.68882863291339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1918e77a958d%3A0x8adb3649babf6b7e!2sNectar%20Digit%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1630559019802!5m2!1sen!2snp"
        ]
    );

        // MissionMessages::insert([
        //     [
        //         "mission" => "RajuPariyar, A Product Of Nectar Digit",
        //         "vision" => "RajuPariyar, A Product Of Nectar Digit",
        //         "company_values" => "RajuPariyar, A Product Of Nectar Digit",
        //         "welcome_title" => "RajuPariyar, A Product Of Nectar Digit",
        //         "welcome_sub_title" => "RajuPariyar, A Product Of Nectar Digit",
        //         "welcome_message" => "RajuPariyar, A Product Of Nectar Digit",
        //         'youtube_link' => "https://www.youtube.com/watch?v=V00TZgYN-jc"
        //     ]
        // ]);

        User::insert([
            [
                "name"=>"Nectar Digit",
                "email"=>"nectardigit@admin.com",
                "password"=>Hash::make("Nectar@321"),
                "created_at"=>date('Y-m-d H:i:s'),
                "updated_at"=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
