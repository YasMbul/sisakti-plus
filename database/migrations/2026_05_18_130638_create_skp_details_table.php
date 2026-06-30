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
      Schema::create('skp_details', function (Blueprint $table) {
         $table->id();
         $table->string('name')->unique();
         $table->integer('bobot');
         $table->foreignId('unsur_id')->constrained('unsurs')->cascadeOnDelete();
         $table->foreignId('sub_unsur_id')->constrained('sub_unsurs')->cascadeOnDelete();
         $table->foreignId('tingkat_id')->constrained('tingkats')->cascadeOnDelete();
         $table->foreignId('partisipasi_id')->constrained('partisipasis')->cascadeOnDelete();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('skp_details');
   }
};
