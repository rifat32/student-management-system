<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->text('description')->nullable();


            $table->boolean('is_active')->default(false);

            $table->unsignedBigInteger("business_id")->nullable(true);
            $table->foreign('business_id')
            ->references('id')
            ->on(env('DB_DATABASE') . '.businesses')
            ->onDelete('cascade');


            $table->unsignedBigInteger("created_by");
            $table->softDeletes();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {

        Schema::dropIfExists('subjects');
    }
}
