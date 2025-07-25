<?php

use App\Zaions\Enums\SignUpTypeEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueId')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            // new fields
            $table->string('slug')->nullable();
            $table->string('profilePitcher')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->integer('dailyMinOfficeTime')->default(8)->min(3)->max(12)->nullable();
            $table->integer('dailyMinOfficeTimeActivity')->default(85)->min(75)->max(100)->nullable();
            $table->string('timezone')->nullable();
            $table->string('address')->nullable();
            $table->string('signUpType')->default(SignUpTypeEnum::normal->value)->nullable();

            $table->string('OTPCode')->nullable()->max(6);
            $table->dateTime('OTPCodeValidTill')->nullable();

            $table->boolean('isActive')->default(true);
            $table->integer('sortOrderNo')->default(0)->nullable();
            $table->json('extraAttributes')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
