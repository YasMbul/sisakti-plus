<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('skps', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('location');
         $table->date('start_date');
         $table->date('end_date');
         $table->string('certificate');
         $table->enum('status', ['pending', 'approved']);
         $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
         $table->foreignId('semester_id')->constrained('semesters')->cascadeOnDelete();
         $table->foreignId('skp_detail_id')->constrained('skp_details')->cascadeOnDelete();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('skps');
   }
};
