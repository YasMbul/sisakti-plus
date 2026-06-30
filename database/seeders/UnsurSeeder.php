<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnsurSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $data = [
         'Kegiatan Bidang Penalaran/Ilmiah' => [
            'Lomba Penalaran (Individu)',
            'Lomba Penalaran Belmawa (Berkelompok)',
            'MBKM',
            'Seminar/Workshop/Pelatihan',
            'Publikasi',
            'Menghasilkan HKI/Paten',
         ],
         'Kegiatan Bidang Minat dan Bakat' => ['Prestasi Lomba Minat Bakat'],
         'Kegiatan Bidang Organisasi dan Kepanitiaan' => [
            'Pengurus Lembaga Mahasiswa',
            'Kepanitiaan',
            'Koordinator Angkatan',
            'Supporter Kegiatan',
         ],
         'Kegiatan Bidang Pengabdian pada Masyarakat' => [
            'Pengabdian di Dalam Kampus',
            'Pengabdian di Luar Kampus',
         ],
      ];

      $unsurs = [];

      foreach ($data as $key => $item) {
         $unsurs[] = [
            'name' => $key,
            'created_at' => now(),
            'updated_at' => now(),
         ];
      }

      DB::table('unsurs')->insert($unsurs);

      $unsurIds = DB::table('unsurs')->pluck('id', 'name');

      $subUnsurs = [];

      foreach ($data as $key => $items) {
         foreach ($items as $subUnsurName) {
            $subUnsurs[] = [
               'name' => $subUnsurName,
               'unsur_id' => $unsurIds[$key],
               'created_at' => now(),
               'updated_at' => now(),
            ];
         }
      }

      DB::table('sub_unsurs')->insert($subUnsurs);
   }
}
