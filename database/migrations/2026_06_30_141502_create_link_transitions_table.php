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
        Schema::create('link_transitions', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->foreignId('link_id')->index()->constrained('links');
            $table->timestamps(); // created_at это время захода
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_transitions');
    }
};
