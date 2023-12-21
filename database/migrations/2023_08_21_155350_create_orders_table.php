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
            $table->unsignedBigInteger('year_master_id');
            // $table->foreign('year_master_id')
            //     ->references('id')
            //     ->on('year_masters')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('company_id');
            // $table->foreign('account_master_id')
            //     ->references('id')
            //     ->on('account_masters')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('product_master_id');
            // $table->foreign('product_master_id')
            //     ->references('id')
            //     ->on('product_masters')
            //     ->onDelete('cascade');
            $table->datetime('order_date');
            $table->integer('number_of_bottle');
            $table->float('bottle_rate_per_kg');
            $table->float('weight_for_single_bottle')->comment('from product_masters');
            $table->integer('discount_1')->default(0);
            $table->integer('discount_2')->default(0);
            $table->integer('discount_3')->default(0);
            $table->tinyInteger('is_active')->default(1)->comment('1: active, 0: inactive');
            $table->unsignedBigInteger('hsn_master_id');
            // $table->foreign('hsn_master_id')
            //     ->references('id')
            //     ->on('hsn_codes')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('gst_master_id');
            // $table->foreign('gst_master_id')
            //     ->references('id')
            //     ->on('gst_masters')
            //     ->onDelete('cascade');
            $table->float('net_payable_amount');
            $table->float('total_payment');
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
        Schema::dropIfExists('orders');
    }
};
