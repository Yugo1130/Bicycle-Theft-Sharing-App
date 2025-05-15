<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DataTime;

class AbandonedBicyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abandoned_bicycles')->insert([
            [
                'user_id' => 1,
                'model' => 'シティサイクル',
                'manufacturer' => 'あさひ（サイクルベースあさひ Asahi）',
                'model_name' => '',
                'frame_num' => 'DW16DH4XBSBT',
                'color' => '白',
                'prefecture' => '北海道',
                'bouhan_num' => 'サ590004',
                'found_at' => '2025-01-09 19:11:00',
                'found_location' => '札幌市中央区',
                'image_path' => '',
                'features' => '',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'model' => 'ロードバイク',
                'manufacturer' => 'GIANT（ジャイアント）',
                'model_name' => 'PROPEL',
                'frame_num' => 'FBSSSD1ZH4RKEM',
                'color' => '青',
                'prefecture' => '東京都',
                'bouhan_num' => '渋谷H02372',
                'found_at' => '2024-01-15 05:23:00',
                'found_location' => '東京都世田谷区',
                'image_path' => '',
                'features' => 'カーボンロード',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'model' => 'シティサイクル',
                'manufacturer' => 'あさひ（サイクルベースあさひ Asahi）',
                'model_name' => '',
                'frame_num' => 'F8AL3QBANC9Q5NI',
                'color' => '緑',
                'prefecture' => '宮崎県',
                'bouhan_num' => '843752',
                'found_at' => '2024-05-06 01:34:00',
                'found_location' => '宮崎県宮崎市',
                'image_path' => 'https://res.cloudinary.com/dwgayp9nd/image/upload/v1747319572/abdbike_3.jpg',
                'features' => '',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'model' => '電動アシスト自転車',
                'manufacturer' => 'あさひ（サイクルベースあさひ Asahi）',
                'model_name' => '',
                'frame_num' => '7BJC8EX6NUE',
                'color' => '赤',
                'prefecture' => '静岡県',
                'bouhan_num' => '自947393',
                'found_at' => '2025-02-14 16:22:00',
                'found_location' => '静岡県御殿場市',
                'image_path' => '',
                'features' => '太めのタイヤ',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
