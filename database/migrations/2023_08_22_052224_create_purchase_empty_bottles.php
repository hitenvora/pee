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
        Schema::create('purchase_empty_bottles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year_master_id');
            // $table->foreign('year_master_id')
            //     ->references('id')
            //     ->on('year_masters')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('account_master_id');
            // $table->foreign('account_master_id')
            //     ->references('id')
            //     ->on('account_masters')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('product_master_id');
            // $table->foreign('product_master_id')
            //     ->references('id')
            //     ->on('product_masters')
            //     ->onDelete('cascade');
            $table->integer('num_of_bottle');
            $table->integer('rate_per_bottle');
            $table->integer('net_pay_amount');
            $table->text('remarks')->nullable();
            $table->tinyInteger('is_active')->default(1)->comment('1:active, 0:inactive');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_empty_bottles');
    }
};
