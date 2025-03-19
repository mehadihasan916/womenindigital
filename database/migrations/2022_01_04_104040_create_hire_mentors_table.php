<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHireMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire_mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('email', 55);
            $table->string('phone', 20);
            $table->string('mentor_name', 55);
            $table->string('mentor_email', 55);
            $table->string('mentor_phone', 20);
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
        Schema::dropIfExists('hire_mentors');
    }
}
