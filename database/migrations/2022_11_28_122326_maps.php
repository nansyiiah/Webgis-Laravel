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
        //
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category_name');
            $table->string('address');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('lat');
            $table->string('long');
            $table->string('url');
            $table->rememberToken();
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
        //
    }
};
