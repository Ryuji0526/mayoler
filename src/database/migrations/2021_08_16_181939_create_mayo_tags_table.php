<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMayoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mayo_tags', function (Blueprint $table) {
            $table->id();
            $table->char('slug', 50)->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('with_mayo_mayo_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('with_mayo_id')->constrained();
            $table->foreignId('mayo_tag_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('with_mayo_mayo_tag');
        Schema::dropIfExists('mayo_tags');
    }
}
