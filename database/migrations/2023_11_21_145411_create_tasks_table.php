<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->text("description")->nullable();
            $table->date("start_date");
            $table->date("due_date")->nullable();
            $table->date("end_date")->nullable();
            $table->enum('status', ['pending','progress', 'completed']);
            $table->unsignedBigInteger("project_id");
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger("parent_task_id")->nullable();
            $table->foreign('parent_task_id')->references('id')->on('tasks')->onDelete('cascade');


            
            $table->unsignedBigInteger("assigned_by")->nullable();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('set null');



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
        Schema::dropIfExists('tasks');
    }
}
