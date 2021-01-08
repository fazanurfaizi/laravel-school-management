<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('examiner')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1)->index()->comment('1=>free, 2=>course, 3=>course & paid, 4=>paid');
            $table->integer('price')->nullable();
            $table->tinyInteger('duration')->unsigned()->default(0);
            $table->tinyInteger('pass_mark')->unsigned()->default(0);
            $table->tinyInteger('number_of_questions')->unsigned()->default(0);
            $table->boolean('random_questions')->default(true);
            $table->boolean('certification')->default(false);
            $table->tinyInteger('difficulty')->unsigned()->default(1);
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
            $table->foreign('examiner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
