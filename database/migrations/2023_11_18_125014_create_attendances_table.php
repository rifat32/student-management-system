<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->text('note')->nullable();
            $table->string('in_geolocation')->nullable();
            $table->string('out_geolocation')->nullable();

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger("work_location_id");
            $table->foreign('work_location_id')->references('id')->on('work_locations')->onDelete('restrict');

            $table->unsignedBigInteger("project_id")->nullable();



            $table->date('in_date');

            $table->boolean("does_break_taken");


            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();

            $table->double('capacity_hours');

            $table->enum('behavior', ['absent', 'late','regular','early']);


            $table->double('work_hours_delta');
            $table->double('regular_work_hours');
            $table->double('total_paid_hours');

            $table->enum('break_type', ['paid', 'unpaid']);
            $table->double('break_hours');

            $table->enum('status', ['pending_approval', 'approved','rejected'])->default("pending_approval");









            $table->boolean("is_active")->default(true);

            $table->unsignedBigInteger("business_id");
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

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
        Schema::dropIfExists('attendances');
    }
}
