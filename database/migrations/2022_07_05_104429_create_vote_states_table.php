<?php

use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_states', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Vote::class)->constrained()->onDelete('cascade');
            $table->boolean('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_states');
    }
};
