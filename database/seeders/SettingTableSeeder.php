<?php

namespace Database\Seeders;

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
        // General Settings
        Setting::updateOrCreate(['key' => 'site_title','value' => 'Women-In-Digital']);
        Setting::updateOrCreate(['key' => 'site_description','value' => 'Women-In-Digital']);
        Setting::updateOrCreate(['key' => 'site_address','value' => 'Dhaka,Bangladesh']);
        // Logo Settings
        Setting::updateOrCreate(['key' => 'site_logo','value' => null]);
        Setting::updateOrCreate(['key' => 'site_favicon','value' => null]);
        // Mail Settings
        Setting::updateOrCreate(['key' => 'mail_mailer','value' => 'smtp']);
        Setting::updateOrCreate(['key' => 'mail_host','value' => 'smtp.mailtrap.io']);
        Setting::updateOrCreate(['key' => 'mail_port','value' => '2525']);
        Setting::updateOrCreate(['key' => 'mail_username','value' => '']);
        Setting::updateOrCreate(['key' => 'mail_password','value' => '']);
        Setting::updateOrCreate(['key' => 'mail_encryption','value' => 'TLS']);
        Setting::updateOrCreate(['key' => 'mail_from_address','value' => '']);
        Setting::updateOrCreate(['key' => 'mail_from_name','value' => 'lather']);
        // Socialite Settings
        // Facebook
        Setting::updateOrCreate(['key' => 'facebook_client_id','value' => null]);
        Setting::updateOrCreate(['key' => 'facebook_client_secret','value' => null]);
        // Google
        Setting::updateOrCreate(['key' => 'google_client_id','value' => null]);
        Setting::updateOrCreate(['key' => 'google_client_secret','value' => null]);
        // Github
        Setting::updateOrCreate(['key' => 'github_client_id','value' => null]);
        Setting::updateOrCreate(['key' => 'github_client_secret','value' => null]);
    }
}
