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
        Schema::create('auth', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();

            $table->id(); // Auto-incrementing ID

            $table->string('_token'); // Token field

            $table->string('firstname'); // First name

            $table->string('lastname'); // Last name

            $table->string('email')->unique(); // Email field

            $table->string('phone'); // Phone number

            $table->string('city'); // City

            $table->string('state'); // State

            $table->string('country'); // Country

            $table->string('age'); // Age

            $table->string('password'); // Password

            $table->string('confirmpassword'); // Confirm Password

            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth');
    }
};
