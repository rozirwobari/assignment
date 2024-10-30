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
        Schema::create('kontak', function (Blueprint $table) {
            $table->id();
            $table->string('telepon', 15)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->mediumText('alamat')->nullable();
            $table->mediumText('email')->nullable();
            $table->timestamps();
        });

        DB::table('kontak')->insert([
            'telepon' => '085155669874',
            'whatsapp' => '085155669874',
            'alamat' => 'Jl. Raya No. 123, Bandung, Jawa Barat',
            'email' => 'info@rzwproject.com',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
