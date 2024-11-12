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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->mediumText('favicon')->nullable();
            $table->longText('img')->charset('utf8mb4')->collation('utf8mb4_bin')->default('[]');
            $table->mediumText('visi')->nullable();
            $table->mediumText('misi')->nullable();
            $table->longText('sejarah')->nullable();
            $table->mediumText('logo')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('website_settings')->insert([
            'id' => 1,
            'name' => 'RZW Project',
            'deskripsi' => 'RZW Project Deskripsi',
            'favicon' => null,
            'img' => '[]',
            'visi' => null,
            'misi' => null,
            'sejarah' => 'RZW Project Sejarah',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
