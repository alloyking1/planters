<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('tags')->insert([
            [
                'name' => 'PHP',
                'description' => 'This is a PHP description taab'
            ],
            [
                'name' => 'Laravel',
                'description' => 'This is a PHP description taab'
            ],
            [
                'name' => 'vueJS',
                'description' => 'This is a PHP description taab'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
