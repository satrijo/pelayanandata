<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'upt' => 'Badan Meteorologi Klimatologi Geofisika',
            'survey' => 'http://google.com',
            'facebook' => 'https://fb.com/satriyo.u.wicaksono',
            'instagram' => 'https://instagram.com/lensatrio',
            'twitter' => '#',
            'youtube' => '#',
            'link1' => 'BMKG Official > https://www.bmkg.go.id',
            'link2' => 'PTSP BMKG > https://ptsp.bmkg.go.id',
            'link3' => 'Aviation BMKG > http://aviation.bmkg.go.id',
            'link4' => 'Joglohub > https://www.joglohub.com',
            'dokumen' => 'https://drive.google.com/file/d/1xVo1OZ-E6jOSjKEUtCW3PTDcYk6mQ7wn/view?usp=sharing',
            'nowa' => '082111119138',
            'rekening' => 'BCA 123123123 a.n Satriyo Unggul Wicaksono',
            'wag' => '62821111119138-7171717',
        ]);
    }
}
