<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbassadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambassadors', function (Blueprint $table) {
            $table->id();
            $table->string('name',55);
            $table->string('email', 55)->unique();
            $table->string('phone', 20);
            $table->string('nid',55)->nullable();
            $table->longText('profession', 500);
            $table->string('thumbnail', 55);
            $table->longText('bio', 500)->nullable();
            $table->string('institution', 55);
            $table->string('facebook');
            $table->string('linkedin');
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
        Schema::dropIfExists('ambassadors');
    }
}
