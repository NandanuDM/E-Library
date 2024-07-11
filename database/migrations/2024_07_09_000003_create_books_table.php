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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title');
            $table->string('author');
            $table->integer('published_year');
            $table->unsignedBigInteger('category_id'); // Foreign key to categories
            $table->unsignedBigInteger('publisher_id'); // Foreign key to publishers
            $table->string('cover_image')->nullable();
            $table->integer('stock');
            $table->integer('rental_price'); // Using integer for rental price
            $table->timestamps(); // Created at and updated at timestamps

            // Define foreign keys
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            
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
        Schema::dropIfExists('books');
    }
}