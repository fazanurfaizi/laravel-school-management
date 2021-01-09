<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->text('requirements')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->string('thumbnail')->nullable();
            $table->date('start_date')->nullable();
            $table->tinyInteger('certified')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsgined();
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
        Schema::dropIfExists('courses');
    }
}
