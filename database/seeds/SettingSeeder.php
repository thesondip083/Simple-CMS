<?php

use Illuminate\Database\Seeder;
use App\Setting;
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
          'site_name'=>'Sondip\'s blog',
          'address'=>'mirpur 2,Dhaka',
          'contact_mail'=>'sondippsingh@gmail.com',
          'contact_number'=>'01789350125',
        ]);
    }
}
