<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string("name",200);
            $table->string("url", 120);
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("name",200);
            $table->text("description")->nullable();
            $table->text("size");
            $table->text("color");
            $table->unsignedBigInteger('category_id');
            $table->boolean("availability")->default(true);
            $table->boolean("draft")->default(false);
            $table->float("price")->default(0.0);
            $table->timestamps();
        });

        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->string("url", 120);
            $table->unsignedBigInteger('product_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('product');
        Schema::dropIfExists('photo');
    }
}
