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
        Schema::create('account_cash_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            // $table->foreign('customer_id')
            //     ->references('id')
            //     ->on('account_masters')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('account_master_id');
            // $table->foreign('account_master_id')
            //     ->references('id')
            //     ->on('account_masters')
            //     ->onDelete('cascade');
            $table->integer('amount');
            $table->tinyInteger('is_credit')->comment('1: credit, 0: debit');
            $table->dateTime('create_date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('account_cash_entries');
    }
};
