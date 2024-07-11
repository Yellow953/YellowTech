<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->datetime('visited_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
