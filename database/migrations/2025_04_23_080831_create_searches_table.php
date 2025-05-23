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
        Schema::create('searches', function (Blueprint $table) {
            $table->id();                                      // 検索条件ID（主キー）
            $table->foreignID('user_id')->constrained()->onDelete('cascade');       // ユーザID（外部キー） 
            $table->string('model', 50);                       // 車種（シティサイクル，クロスバイクなど）
            $table->string('manufacturer', 50)->nullable();    // メーカー名
            $table->string('model_name', 100)->nullable();     // 車体名
            $table->string('frame_num', 50);                   // 車体番号
            $table->string('color', 30);                       // 色
            $table->string('bouhan_num', 50);                  // 防犯登録番号
            $table->boolean('wants_notification');             // 通知の有無
            $table->timestamps();                              // created_at, updated_at
            $table->softDeletes();                             // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('searches');
    }
};
