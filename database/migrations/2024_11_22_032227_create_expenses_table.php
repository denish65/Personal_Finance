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
        Schema::create('expenses', function (Blueprint $table) {
            // $table->id();
            $table->id(); // Auto-incrementing primary key
            $table->string('first_name'); // First name
            $table->string('last_name'); // Last name
            $table->date('date'); // Date of the expense
            $table->enum('payment_type', ['cash', 'credit', 'debit', 'online']); // Payment type (you can adjust based on your needs)
            $table->string('reference_image')->nullable(); // Path to the reference image (nullable)
            $table->text('expense_note')->nullable(); // Expense note (nullable)
            $table->string('location'); // Location where the expense occurred
            $table->string('item_name'); // Item name
            // $table->enum('payment_for', ['personal', 'group', 'room'])->default('personal');
            $table->string('payment_for');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
