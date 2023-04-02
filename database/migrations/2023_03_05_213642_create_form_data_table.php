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
        Schema::create('form_data', function (Blueprint $table) {
        $table->id();
        $table->string('dname');
        $table->integer('dnumber');
        $table->integer('rnumber');
        $table->string('approve');
        $table->date('creationdate')->nullable();
        $table->string('ptype');
        $table->longtext('profile');
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
        Schema::dropIfExists('form_data');
    }
};
