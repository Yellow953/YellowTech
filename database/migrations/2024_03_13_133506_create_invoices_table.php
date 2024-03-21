<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->date('date');
            $table->date('due_date')->nullable();
            $table->string('currency')->default('USD');
            $table->double('rate')->default('1');
            $table->bigInteger("project_id")->unsigned();
            $table->bigInteger("client_id")->unsigned();
            $table->string('status')->default('new');
            $table->double('total_price')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};