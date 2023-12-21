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
        Schema::create('account_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('group_master_id');
            // $table->foreign('group_master_id')
            //     ->references('id')
            //     ->on('group_masters')
            //     ->onDelete('cascade');
            $table->float('opening_balance');
            $table->float('credit_limit');
            $table->tinyInteger('is_credit')->default(1)->comment('1: credit, 0: debit');
            $table->longText('address');
            $table->string('city');
            $table->string('gst_no');
            $table->string('contact_person');
            $table->string('mobile_no');
            $table->string('user_name')->unique()->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('is_active')->default(1)->comment('1: active, 0: inactive');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->string('auth_token')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_masters');
    }
};
