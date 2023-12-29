<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAddressHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_address_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("employee_id");
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

            $table->string("address_line_1")->nullable();
            $table->string("address_line_2")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("postcode")->nullable();
            $table->string("lat")->nullable();
            $table->string("long")->nullable();
            $table->date("from_date");
            $table->date("to_date")->nullable();
            $table->unsignedBigInteger("created_by")->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
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
        Schema::dropIfExists('employee_address_histories');
    }
}