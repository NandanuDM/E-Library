<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the books table
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title');
            $table->string('isbn');
            $table->string('author');
            $table->integer('published_year');
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key to categories
            $table->unsignedBigInteger('publisher_id')->nullable(); // Foreign key to publishers
            $table->string('language')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('stock');
            $table->integer('rental_price'); // Using integer for rental price
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Adding deleted_at column for soft deletes

            // Define foreign keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('set null');
            
            $table->engine = 'InnoDB'; // Ensure InnoDB engine
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the books table
        Schema::dropIfExists('books');
    }
}