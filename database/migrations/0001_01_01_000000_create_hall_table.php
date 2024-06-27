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
        Schema::create('hall', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('location', 50);
            $table->unsignedInteger("booking_price");
            $table->unsignedInteger("capacity");
            $table->boolean("is_available")->default(true);
            $table->string("hall_type");
            $table->unsignedBigInteger("owner_id");
            $table->foreign("owner_id")->references("id")->on("hall_owner");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall');
    }
};
