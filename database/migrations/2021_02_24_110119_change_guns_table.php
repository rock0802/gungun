<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guns', function (Blueprint $table){
            $table->text('body')->change();
            
        });
        Schema::table('gun', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guns', function (Blueprint $table) {
         //カラム属性の変更
         $table->string('body',255)->change();
         });
        Schema::table('gun', function (Blueprint $table) {
            //
        });
    }
}
