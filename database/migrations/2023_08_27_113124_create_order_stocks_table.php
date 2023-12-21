<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year_master_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('product_master_id');
            $table->integer('number_of_bottle_received')->default(0);
            $table->datetime('order_received_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('order_stocks');
    }
};
