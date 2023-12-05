<?php

use App\Models\Participates;
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
        Schema::create('participates', function (Blueprint $table) {
            $table->primary(['user_id', 'event_id', 'present']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('event_id')->references('event_id')->on('events');
            $table->boolean('present');
            $table->timestamps();
        });


        Participates::create([
            'user_id' => 2, 
            'event_id' => 1,
            'present' => 0,
        ]);

        Participates::create([
            'user_id' => 1, 
            'event_id' => 2,
            'present' => 1,
        ]);
    
    }

   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participates');
    }
};
