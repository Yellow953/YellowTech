<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->timestamp('call_time')->nullable();
            $table->string('response')->nullable();
            $table->boolean('reschedule')->default(false);
            $table->timestamp('reschedule_time')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign(columns: 'client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
