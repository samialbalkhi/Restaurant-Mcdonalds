<?php

use App\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_cafes', function (Blueprint $table) {
            $table->id();
            $table->string('title_mycafe_drinks');
            $table->longText('description_drinks_cold');
            $table->string('cold_drinks');
            $table->string('title_mycafe_sweets');
            $table->string('description_sweets');
            $table->string('image_drinks');
            $table->string('image_sweets');
            $table
                ->foreignIdFor(Section::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_cafes');
    }
};
