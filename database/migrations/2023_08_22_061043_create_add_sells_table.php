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
        Schema::create('add_sells', function (Blueprint $table) {
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
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('supplier_id');
            // $table->foreign('product_master_id')
            //     ->references('id')
            //     ->on('product_masters')
            //     ->onDelete('cascade');
            $table->datetime('order_date');
            $table->string('order_code')->nullable();
            $table->integer('ch_number');
            $table->integer('filled_bottle_delivered');
            $table->integer('empty_bottle_received');
            $table->integer('total_bottle_stock_delivered_time');
            $table->integer('rate_per_bottle');
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
            $table->tinyInteger('is_active')->default(1)->comment('1: active, 0: inactive');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('created_by_supplier')->nullable();
            $table->bigInteger('updated_by_supplier')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_sells');
    }
};
