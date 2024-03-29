<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveArrearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_arrears', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("leaves_id");
            $table->foreign('leaves_id')->references('id')->on('leaves')->onDelete('cascade');
            $table->enum('status', ['pending_approval', 'approved','rejected'])->default("pending_approval");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_arrears');
    }
}
