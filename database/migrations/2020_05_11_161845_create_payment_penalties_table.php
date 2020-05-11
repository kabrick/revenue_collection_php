<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPenaltiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('payment_penalties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_owner_id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('penalty_paid')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('payment_penalties');
    }
}
