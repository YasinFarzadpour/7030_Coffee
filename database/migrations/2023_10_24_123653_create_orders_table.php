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
        Schema::create('orders', function (Blueprint $table) {
            $table->id             ();
            $table->string         ('order_number')  ->unique();
            $table->foreignId      ('user_id')       ->constrained()->onDelete('cascade');
            $table->integer        ('status')        ->default(0);
            $table->bigInteger     ('grand_total');
            $table->unsignedInteger('item_count');
            $table->boolean        ('payment_status')->default(0);
            $table->string         ('payment_method')->nullable();
            $table->string         ('first_name');
            $table->string         ('last_name');
            $table->text           ('address');
            $table->string         ('post_code');
            $table->string         ('phone_number');
            $table->text           ('notes')         ->nullable();
            $table->timestamps     ();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};