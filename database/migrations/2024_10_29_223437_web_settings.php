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
            $table->mediumText('name')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->mediumText('favicon')->nullable();
            $table->longText('img')->nullable()
                  ->charset('utf8mb4')
                  ->collation('utf8mb4_bin')
                  ->check('json_valid(`img`)');
            $table->mediumText('visi')->nullable();
            $table->mediumText('misi')->nullable();
            $table->longText('sejarah')->nullable();
        });


        DB::table('website_settings')->insert([
            'name' => 'BAPEDA Kota Bandung',
            'deskripsi' => 'BAPEDA Kota Bandung Deskripsi',
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
