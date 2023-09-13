<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('festival_category_id');
            $table->foreign('festival_category_id')->references('id')->on('festival_categories')->cascadeOnDelete();

            $table->string('name');
            $table->string('banner_img')->nullable();
            $table->string('slug')->unique();
            $table->dateTime('date');
            $table->string('location');
            $table->text('description');
            $table->integer('likes');
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
        Schema::dropIfExists('festivals');
    }
};
