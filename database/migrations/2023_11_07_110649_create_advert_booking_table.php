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
        Schema::create('advert_booking', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('advertID', 100);
            $table->string('email', 100);
            $table->boolean('status')->nullable()->default(true);
            $table->string('deleted_at', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advert_booking');
    }
};
