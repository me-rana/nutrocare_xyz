<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('banner_category_id')->unsigned()->index()->nullable();
            $table->foreign('banner_category_id')->references('id')->on('bannercategories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('link')->nullable();
            $table->string('image',500)->nullable();
            $table->bigInteger('status')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
