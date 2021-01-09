<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('type')->unsigned()->default(1)->comment('1=>text, 2=> video, 3=>audio, 4=> pdf');
            $table->json('object')->nullable();
            $table->text('short_text')->nullable();
            $table->text('full_text')->nullable();
            $table->tinyInteger('position')->unsigned()->default(1);
            $table->tinyInteger('status')->unsigned()->default(1)->comment('1=>free, 2=>subscriber, 3=>paid');
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
