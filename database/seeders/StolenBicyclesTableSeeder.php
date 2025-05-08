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
                'model' => 'クロスバイク',
                'manufacturer' => 'BRIDGESTONE',
                'model_name' => 'Ordina',
                'frame_num' => 'XYZ123456',
                'color' => 'Blue',
                'bouhan_num' => 'BHN-112233',
                'stolen_at' => Carbon::now()->subDays(2),
                'stolen_location' => '東京都中野区中央',
                'image_path' => 'images/bike1.jpg',
                'features' => 'サドルが高め、ライト付き',
                'other' => 'ハンドルにキズあり',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'model' => 'ロードバイク',
                'manufacturer' => 'GIANT',
                'model_name' => 'TCR Advanced',
                'frame_num' => 'DEF234567',
                'color' => 'Black',
                'bouhan_num' => 'BHN-223344',
                'stolen_at' => Carbon::now()->subDays(5),
                'stolen_location' => '大阪市北区',
                'image_path' => 'images/bike2.jpg',
                'features' => 'ドリンクホルダー付き',
                'other' => 'チェーンが金色',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'model' => 'マウンテンバイク',
                'manufacturer' => 'TREK',
                'model_name' => 'Marlin 5',
                'frame_num' => 'GHI345678',
                'color' => 'Red',
                'bouhan_num' => 'BHN-334455',
                'stolen_at' => Carbon::now()->subDays(1),
                'stolen_location' => '名古屋市中区',
                'image_path' => 'images/bike3.jpg',
                'features' => '太めのタイヤ',
                'other' => 'ブレーキに難あり',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'model' => 'ミニベロ',
                'manufacturer' => 'DAHON',
                'model_name' => 'Boardwalk',
                'frame_num' => 'JKL456789',
                'color' => 'Green',
                'bouhan_num' => 'BHN-445566',
                'stolen_at' => Carbon::now()->subDays(7),
                'stolen_location' => '横浜市西区',
                'image_path' => 'images/bike4.jpg',
                'features' => '折りたたみ式',
                'other' => 'ペダルがカスタム品',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'model' => 'シティサイクル',
                'manufacturer' => 'Panasonic',
                'model_name' => 'ViVi DX',
                'frame_num' => 'MNO567890',
                'color' => 'Silver',
                'bouhan_num' => 'BHN-556677',
                'stolen_at' => Carbon::now()->subDays(3),
                'stolen_location' => '札幌市中央区',
                'image_path' => 'images/bike5.jpg',
                'features' => '前かご付き・ベルが大きい',
                'other' => 'スタンドが固め',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
