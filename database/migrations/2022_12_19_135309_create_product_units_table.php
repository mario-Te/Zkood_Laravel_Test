<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_unit', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('unit_id')
            ->constrained('units')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('product_id')
            ->constrained('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_units');
    }
};
