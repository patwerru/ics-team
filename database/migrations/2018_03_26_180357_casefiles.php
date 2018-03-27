<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Casefiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_files', function (Blueprint $table){
            $table->increments('id');
            $table->string('case_number');
            $table->string('title');
            $table->string('category');
            $table->string('sub_category');
            $table->string('code');
            $table->string('court');
            $table->string('magistrate');
            $table->string('status');
            $table->string('hearing_date');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('case_files');
    }
}
