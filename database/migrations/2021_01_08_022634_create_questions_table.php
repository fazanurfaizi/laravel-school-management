<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('exam_id')->unsigned()->index();
            $table->tinyInteger('qtype')->default(0)->comment('0: Objective; 1: True/False');
            $table->text('question');
            $table->json('options')->nullable();
            $table->json('answer')->nullable();
            $table->string('hint')->nullable();
            $table->integer('mark')->default(1);
            $table->integer('nmark')->default(0);
            $table->string('explanation')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
