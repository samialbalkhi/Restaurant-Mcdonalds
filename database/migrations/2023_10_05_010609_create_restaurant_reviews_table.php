<?php

use App\Models\User;
use App\Models\RestaurantBranche;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_reviews', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignIdFor(RestaurantBranche::class)
                // ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignIdFor(User::class)
                // ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedTinyInteger('rating')->default(1);
            $table->longText('comment')->nullable();
            $table->string('review_type')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_reviews');
    }
};
