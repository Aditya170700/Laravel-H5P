<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHH5pLibrariesDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hh5p_libraries_dependencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('library_id')->unsigned();
            $table->foreign('library_id')->references('id')->on('hh5p_libraries')->onDelete('cascade');
            $table->bigInteger('required_library_id')->unsigned();
            $table->foreign('required_library_id')->references('id')->on('hh5p_libraries')->onDelete('cascade');
            $table->string('dependency_type', 31);
            $table->unique(['library_id', 'required_library_id'], 'hh5p_libraries_dependencies_unique_key');

            // TODO add foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hh5p_libraries_dependencies');
    }
}
