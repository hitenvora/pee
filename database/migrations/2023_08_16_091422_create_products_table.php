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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('company_master_id');
            // $table->foreign('company_master_id')
            //     ->references('id')
            //     ->on('company_masters')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('hsn_code_id');
            // $table->foreign('hsn_code_id')
            //     ->references('id')
            //     ->on('hsn_codes')
            //     ->onDelete('cascade');
            $table->string('gst');
            $table->string('opening_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
