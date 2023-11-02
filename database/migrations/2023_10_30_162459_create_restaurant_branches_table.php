<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table
                ->foreignIdFor(City::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
                $table->decimal('deliveryprice');
                $table->integer('arrivaltime');
                $table->string('image');
                $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_branches');
    }
};
