<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**$2y$10$LjH2ozamASp63YSepNceXejOPInffyHCFM0CjmpGfZr9dh7SQ181S
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_images', function(Blueprint $table){
            $table->dropForeign('projects_images_project_id_foreign');
        });
    }
}
