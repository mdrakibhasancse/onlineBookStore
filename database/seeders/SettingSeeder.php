<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name'=>'Bookshop',
            'email'=>'admin@gmail.com',
            'address'=>'Netrakona',
            'mobile'=>'01970009329',
            'copyright'=>'Copyright © 2022. All Right Reserved',
            'facebook'=>'https://web.facebook.com/?_rdc=1&_rdr',
            'linkedin'=>'https://www.linkedin.com/feed/',
            'twitter'=>'https://twitter.com/home',
            'reddit'=>'https://www.reddit.com/',
            'instagram'=>'https://www.instagram.com/?hl=en'
        ]);
    }
}
