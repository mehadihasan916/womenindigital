<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndomitableWomensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indomitable_womens', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('designation', 191);
            $table->longText('short_description', 300);
            $table->longText('page_banner');
            $table->longText('body');
            $table->string('thumbnail', 55);
            $table->integer('position')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('indomitable_womens');
    }
}
