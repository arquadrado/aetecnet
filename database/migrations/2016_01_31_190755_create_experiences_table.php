<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start');
            $table->string('end');
            $table->string('function');
            $table->string('institution');
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');;
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
        Schema::drop('experiences', function(Blueprint $table){
            $table->dropForeign('experiences_member_id_foreign');
        });
        
    }
}
