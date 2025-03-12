<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
         public function up()
          {
              Schema::create('user_matches', function (Blueprint $table) {
              $table->id();
              $table->foreignId('matcher_id')->constrained('users')->onDelete('cascade');
              $table->foreignId('matched_id')->constrained('users')->onDelete('cascade');
              $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
               $table->timestamps();
              });
           }

public function down()
{
    Schema::dropIfExists('user_matches');
}

   
};
