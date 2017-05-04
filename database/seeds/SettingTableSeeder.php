<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'title' =>'Salahly',
            'copyrights' => '© Salahly 2014. All right reserved.',
            'meta_description' => 'Salahly for .....',
            'meta_keywords' => 'salahly, maintainance, pc, laptop',
            'fb_account' => 'https://www.kza.com',
            'tw_account' => 'https://www.kza.com',
            'yt_account' => 'https://www.kza.com',
            'gp_account' => 'https://www.kza.com',
            'google_ann' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- wza2ef --><ins class="adsbygoogle"    style="display:block"    data-ad-client="ca-pub-2178725799240442"    data-ad-slot="4745084170"    data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>',
            'webmaster_email' => 'info@salahly.com',
            'support_email' => 'support@salahly.com',
            'phone' => '01234567890'
        ]);

    }
}
