<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHH5pLibrariesLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hh5p_libraries_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('library_id')->unsigned();
            $table->foreign('library_id')->references('id')->on('hh5p_libraries')->onDelete('cascade');
            $table->string('language_code', 31);
            // TODO: this should be json
            $table->text('translation', 65535);
            $table->unique(['library_id', 'language_code'], 'hh5p_libraries_languages_unique_key');
            // TODO: add foreign keys
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hh5p_libraries_languages');
    }
}
