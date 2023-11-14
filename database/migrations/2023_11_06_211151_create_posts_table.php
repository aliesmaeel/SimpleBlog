<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',2048);
            $table->string('slug',2048);
            $table->string('image',2048)->nullable();
            $table->longText('body');
            $table->boolean('active')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
