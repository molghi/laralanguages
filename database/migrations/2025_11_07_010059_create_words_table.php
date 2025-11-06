<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word_phrase');
            $table->string('language');
            $table->string('translation')->nullable();
            $table->string('definition')->nullable();
            $table->string('category')->nullable();
            $table->string('web_img')->nullable();
            $table->string('example_usage')->nullable();
            $table->string('note')->nullable();
            $table->dateTime('next_revision')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('words');
    }
}
