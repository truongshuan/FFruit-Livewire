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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable(false);
            $table->string('customer_phone')->nullable(false);
            $table->string('customer_email')->nullable(false);
            $table->text('shipping_address')->nullable(false);
            $table->text('note');
            $table->decimal('total_price', 13, 2, true);
            $table->enum('status', [0, 1, 2, 3])->comment('0: peding, 1: paymented, 2: compoleted, 3: cancelled')->default(0);
            $table->unsignedBigInteger('user_id')->index()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
