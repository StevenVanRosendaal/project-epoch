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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outpost_id')->constrained();
            $table->enum('type', [
                'sawmill',
                'quarry',
                'goldmine',
                'lumber_camp',
                'mine_camp',
                'treasury'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buildings', function (Blueprint $table) {
            $table->dropForeign('outpost_id');
        });
        Schema::dropIfExists('buildings');
    }
};
