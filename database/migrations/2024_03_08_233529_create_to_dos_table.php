<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDosTable extends Migration
{
    public function up()
    {
        Schema::create('to_dos', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->enum('status', ['pending', 'ongoing', 'done'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('to_dos');
    }
}
