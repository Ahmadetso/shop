<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->unsignedInteger('num_pages');
            $table->unsignedInteger('num_copies');
            $table->unsignedInteger('pub_year')->nullable();
            $table->string('cover_image');
            $table->unsignedInteger('pub_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('category_id')
                ->refrences('id')
                ->on('categories')
                ->onDelete('set null');

            $table->foreign('pub_id')
                ->refrences('id')
                ->on('pubs')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
