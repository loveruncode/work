<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;
use League\CommonMark\Reference\ReferenceParser;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->tinyInteger('is_featured')->default(0);
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->longText('content');
            $table->timestamp('posted_at')->nullable();
            $table->timestamps();
            //  foreign keys
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

        });

        // Schema::dropIfExists('post');
    }
};
