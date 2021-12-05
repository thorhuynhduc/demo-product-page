<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        DB::table('brands')->insert([
            [
                'name' => 'Apple',
                'description' => 'It is one of the most premium mobile brands in the world. It is an American multinational technology company and is one of the biggest tech companies in the world. It was founded on April 1st, 1976 by Steve Jobs, Steve Wozniak, Ronald Wayne',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Samsung',
                'description' => 'Samsung is a big name in phone companies and has emerged as one of the top mobile brands in the world. It is a South Korean company founded on 1st March 1938',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'LG',
                'description' => 'LG Electronics is a South Korean multinational company founded by Koo-In-hwoi in 1958',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Xiaomi',
                'description' => 'It is a Chinese multinational company founded in April 2010 by Lei Jun',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Oppo',
                'description' => 'Guangdong OPPO Mobile Telecommunication Corp., Ltd, stylized as OPPO, is a Chinese company founded by Tony Chen in 2001',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Motorola',
                'description' => 'It’s an American multinational telecommunications company in 1928 founded by Paul and Joseph Galvin',
                'available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
