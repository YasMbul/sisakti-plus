<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $tingkat = [
         'Internasional',
         'Nasional',
         'Regional',
         'Provinsi',
         'Kabupaten/Kota',
         'Universitas',
         'Fakultas',
         'Program Studi',
      ];

      $data = [];

      foreach ($tingkat as $item) {
         $data[] = [
            'name' => $item,
            'created_at' => now(),
            'updated_at' => now(),
         ];
      }

      DB::table('tingkats')->insert($data);
   }
}
