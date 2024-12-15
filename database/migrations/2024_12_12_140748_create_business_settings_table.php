<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_id')
            ->constrained('businesses')
            ->onDelete('cascade');

            $table->unsignedBigInteger("online_student_status_id");
            $table->foreign('online_student_status_id')->references('id')->on('student_statuses')->onDelete('cascade');
            $table->json('student_data_fields')->nullable(); // Online Form Fields (JSON)


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
        Schema::dropIfExists('business_settings');
    }
}
