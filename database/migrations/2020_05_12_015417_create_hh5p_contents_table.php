<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHH5pContentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hh5p_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique()->nullable();
            $table->timestamps();
            $table->bigInteger('user_id')->nullable()->unsigned(); // ADD key
            $table->string('title');
            $table->bigInteger('library_id')->unsigned(); // ADD key
            $table->foreign('library_id')->references('id')->on('hh5p_libraries')->onDelete('cascade');
            $table->mediumText('parameters'); // TODO this can be JSON type
            $table->string('nonce', 8)->unique(); // used for assiging temporary editor files to content


            // TODO: do we need those ?
            $table->text('filtered')->nullable();
            $table->string('slug', 127)->nullable();
            $table->string('embed_type', 127)->nullable();
            $table->bigInteger('disable')->unsigned()->default(0);
            $table->string('content_type', 127)->nullable();
            $table->string('author', 127)->nullable();
            $table->string('license', 7)->nullable();
            $table->text('keywords', 65535)->nullable();
            $table->text('description', 65535)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hh5p_contents');
    }
}
