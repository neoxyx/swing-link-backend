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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lat')->after('email');
            $table->string('lng')->after('lat');
            $table->string('profile')->after('lng');
            $table->string('name_first')->after('profile');
            $table->string('name_second')->after('name_first')->nullable();
            $table->string('gender_fisrt')->after('name_second');
            $table->string('gender_second')->after('gender_fisrt')->nullable();
            $table->string('orientation_fisrt')->after('gender_second')->nullable();
            $table->string('orientation_second')->after('orientation_fisrt')->nullable();
            $table->timestamp('birthdate_first')->after('orientation_second');
            $table->timestamp('birthdate_second')->after('birthdate_first')->nullable();
            $table->string('about')->after('birthdate_second')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
