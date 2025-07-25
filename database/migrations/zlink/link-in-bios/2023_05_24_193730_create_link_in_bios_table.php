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
        Schema::create('link_in_bios', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueId')->nullable();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('workspaceId');
            $table->unsignedBigInteger('folderId')->default(1);

            $table->json('theme')->nullable();
            $table->json('settings')->nullable();
            $table->json('poweredBy')->nullable();
            $table->string('linkInBioTitle')->nullable();
            $table->string('featureImg')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('pixelIds')->nullable();
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


            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('workspaceId')->references('id')->on('work_spaces')->onDelete('cascade');

            $table->integer('sortOrderNo')->default(0)->nullable();
            $table->boolean('isActive')->default(true)->nullable();
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
        Schema::dropIfExists('link_in_bios');
    }
};
