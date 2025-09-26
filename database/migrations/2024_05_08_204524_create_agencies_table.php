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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('type');
            $table->string('headquarters');
            $table->string('size');
            $table->string('project_size');
            $table->string('website');
            $table->string('video')->nullable();
            $table->string('feature_img')->nullable();
            $table->string('short_description');
            $table->text('about_company');
            $table->string('about_video')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
