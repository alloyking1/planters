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
        Schema::create('agencie_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id');
            $table->foreignId('skill_id');
            $table->timestamps();
        });

        DB::table('agencie_skill')->insert([
            [
                'agency_id' => 1,
                'skill_id' => 1
            ],
            [
                'agency_id' => 3,
                'skill_id' => 1
            ],
            [
                'agency_id' => 2,
                'skill_id' => 1
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencie_skill');
    }
};
