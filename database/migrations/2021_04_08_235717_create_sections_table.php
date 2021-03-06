<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status');
            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('class_id')->unsigned();
            $table->timestamps();


            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class_rooms')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
