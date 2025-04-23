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
        Schema::create('abandoned_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignID('abandoned_bicycle_id')->constrained()->onDelete('cascade');       // 放置自転車投稿ID（外部キー） 
            $table->foreignID('user_id')->constrained()->onDelete('cascade');                    // ユーザID（外部キー） 
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abandoned_comments');
    }
};
