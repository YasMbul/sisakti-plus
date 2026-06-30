<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $startYear = 2020;
      $endYear = 2025;

      $semesters = [];

      for ($year = $startYear; $year <= $endYear; $year++) {
         $nextYear = $year + 1;

         $semesters[] = [
            'name' => "Ganjil-{$year}/{$nextYear}",
            'created_at' => now(),
            'updated_at' => now(),
         ];

         $semesters[] = [
            'name' => "Genap-{$year}/{$nextYear}",
            'created_at' => now(),
            'updated_at' => now(),
         ];
      }

      DB::table('semesters')->insert($semesters);
   }
}
