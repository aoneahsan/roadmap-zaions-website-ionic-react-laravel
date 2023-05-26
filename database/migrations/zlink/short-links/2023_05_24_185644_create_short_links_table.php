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
        Schema::create('short_links', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueId')->nullable();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('workspaceId');
            $table->unsignedBigInteger('folderId');

            $table->string('type')->nullable();
            $table->json('target')->nullable();
            $table->string('title')->nullable();
            $table->string('featureImg')->nullable();
            $table->text('description')->nullable();
            $table->string('pixelIds')->nullable();
            $table->json('utmTagInfo')->nullable();
            $table->json('shortUrl')->nullable();
            $table->string('notes')->nullable();
            $table->string('tags')->nullable();
            $table->json('abTestingRotatorLinks')->nullable();
            $table->json('geoLocationRotatorLinks')->nullable();
            $table->json('linkExpirationInfo')->nullable();
            $table->json('password')->nullable();
            $table->string('favicon')->nullable();
            $table->boolean('isFavorite')->nullable();

            $table->boolean('isActive')->default(true);
            $table->integer('sortOrderNo')->default(0)->nullable();
            $table->json('extraAttributes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_links');
    }
};
