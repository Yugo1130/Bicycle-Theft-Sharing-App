<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abandoned_bicycles', function (Blueprint $table) {
            $table->id();                                      // 放置自転車投稿ID（主キー）
            $table->foreignID('user_id')->constrained()->onDelete('cascade');       // ユーザID（外部キー） 
            $table->string('model', 50);                       // 車種（シティサイクル，クロスバイクなど）
            $table->string('manufacturer', 50);                // メーカー名
            $table->string('model_name', 100)->nullable();     // 車体名
            $table->string('frame_num', 50)->nullable();       // 車体番号
            $table->string('color', 30)->nullable();           // 色
            $table->string('prefecture', 20)->nullable();      // 都道府県
            $table->string('bouhan_num', 50)->nullable();      // 防犯登録番号
            $table->dateTime('found_at');                      // 発見日時（例: 2025-04-23 14:00）
            $table->string('found_location', 255);             // 発見場所（例: ○○公園前の電柱横）
            $table->string('image_path')->nullable();          // 画像ファイルの保存パス
            $table->text('features')->nullable();              // 車体の特徴
            $table->text('other')->nullable();                 // その他
            $table->timestamps();                              // created_at, updated_at
            $table->softDeletes();                             // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abandoned_bicycles');
    }
};
