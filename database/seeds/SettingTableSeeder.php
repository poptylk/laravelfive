<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        Setting::create(['key' => 'keywords'      , 'value' => '網站測試,123,test']);
        Setting::create(['key' => 'description'   , 'value' => '網站測試網站測試網站測試']);
        Setting::create(['key' => 'auther'        , 'value' => '網站測試']);
        Setting::create(['key' => 'website_name'  , 'value' => '網站測試']);
        Setting::create(['key' => 'website_logo'  , 'value' => '']);
        Setting::create(['key' => 'website_icon'  , 'value' => '']);
        Setting::create(['key' => 'website_url'   , 'value' => 'http://test.com.tw']);
        Setting::create(['key' => 'website_email' , 'value' => 'test@test.tw']);
        Setting::create(['key' => 'website_addr'  , 'value' => '台中市西區忠忠路']);
        Setting::create(['key' => 'website_tel'   , 'value' => '0424220403']);
        Setting::create(['key' => 'website_fax'   , 'value' => '0399875838']);
        Setting::create(['key' => 'website_switch', 'value' => '1']);
    }
}
