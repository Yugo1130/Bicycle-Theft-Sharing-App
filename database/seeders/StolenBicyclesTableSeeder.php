<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DataTime;

class StolenBicyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stolen_bicycles')->insert([
            [
                'user_id' => 1,
                'model' => 'シティサイクル',
                'manufacturer' => 'BRIDGESTONE（ブリヂストン）',
                'model_name' => 'アルベルト',
                'frame_num' => 'WA20RN8I8CJ',
                'color' => '黒',
                'prefecture' => '東京都',
                'bouhan_num' => '新宿B79361',
                'stolen_at' => '2023-10-02 20:28:00',
                'stolen_location' => '東京都中野区',
                'image_path' => '',
                'features' => '前かご付き',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'model' => '電動アシスト自転車',
                'manufacturer' => 'BRIDGESTONE（ブリヂストン）',
                'model_name' => 'Bikke mob',
                'frame_num' => '1TS2TZ0LRR6ML',
                'color' => '赤',
                'prefecture' => '東京都',
                'bouhan_num' => '成城I23634',
                'stolen_at' => '2024-10-17 07:20:00',
                'stolen_location' => '神奈川県藤沢市',
                'image_path' => '',
                'features' => '子乗せ自転車',
                'other' => 'スタンドが固め',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'model' => 'クロスバイク・ピストバイク',
                'manufacturer' => 'Louis Garneau（ルイガノ）',
                'model_name' => 'CITYROAM8.0',
                'frame_num' => '1P364CUMFU',
                'color' => 'シルバー',
                'prefecture' => '愛知県',
                'bouhan_num' => '25-ウ-67137',
                'stolen_at' => '2023-08-23 04:26:00',
                'stolen_location' => '愛知県豊橋市',
                'image_path' => '',
                'features' => '赤色のドリンクホルダー付き',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'model' => 'ロードバイク',
                'manufacturer' => 'Specialized（スペシャライズド）',
                'model_name' => 'Tarmac SL8',
                'frame_num' => 'A0BAKR8EINP6G',
                'color' => '黒',
                'prefecture' => '東京都',
                'bouhan_num' => '世田谷G98390',
                'stolen_at' => '2025-03-07 10:55:00',
                'stolen_location' => '東京都世田谷区',
                'image_path' => 'https://res.cloudinary.com/dwgayp9nd/image/upload/v1747319572/slnbike_4.jpg',
                'features' => 'ホイールがRapide CLX',
                'other' => 'ペダルがカスタム品',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'model' => 'その他',
                'manufacturer' => 'ピープル（ピープル）',
                'model_name' => '',
                'frame_num' => '38W47EMGHVIND',
                'color' => '青',
                'prefecture' => '宮城県',
                'bouhan_num' => '82808356',
                'stolen_at' => '2024-10-22 03:15:00',
                'stolen_location' => '大阪市北区',
                'image_path' => '',
                'features' => '子供自転車',
                'other' => 'ハンドルにキズあり',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'model' => 'クロスバイク・ピストバイク',
                'manufacturer' => 'MERIDA（メリダ）',
                'model_name' => 'スクルトゥーラ',
                'frame_num' => 'HYDIN64CW',
                'color' => '青',
                'prefecture' => '東京都',
                'bouhan_num' => '武蔵野I39283',
                'stolen_at' => '2024-11-20 10:34:00',
                'stolen_location' => '名古屋市中区',
                'image_path' => '',
                'features' => 'タイヤ細め',
                'other' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
