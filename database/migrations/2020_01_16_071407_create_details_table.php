<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('checklist_id')->unsigned()->index();
            $table->string('detailName');
            $table->text('detailDescription');
            $table->tinyInteger('secondary_check1');
            $table->tinyInteger('secondary_check2');
            $table->tinyInteger('secondary_check3');
            $table->tinyInteger('secondary_check4');
            $table->tinyInteger('secondary_check5');
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
        Schema::dropIfExists('detail');
    }
}
