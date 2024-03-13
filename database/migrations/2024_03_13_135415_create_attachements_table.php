<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attachements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("project_id")->unsigned()->nullable();
            $table->bigInteger("ticket_id")->unsigned()->nullable();
            $table->string('path');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachements');
    }
};
