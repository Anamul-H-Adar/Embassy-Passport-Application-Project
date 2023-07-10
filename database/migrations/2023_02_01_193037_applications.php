<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->text('rf_embassy')->nullable();
            $table->string('submit_date')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('name',256)->nullable();
            $table->string('old_mrp_no',64)->nullable();
            $table->string('new_mrp_no',64)->nullable();
            $table->string('enrollment_no',64)->nullable();
            $table->string('mobile_no',64)->nullable();
            $table->string('branch_name',64)->nullable();
            $table->text('remarks',64)->nullable();
            $table->enum('status',['pending','received','delivered','halt'])->default('pending');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
