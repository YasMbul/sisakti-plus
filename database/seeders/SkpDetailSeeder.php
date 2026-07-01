<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkpDetailSeeder extends Seeder
{
   public function run(): void
   {
      $unsurs = DB::table('unsurs')->get();
      $tingkats = DB::table('tingkats')->pluck('id');
      $partisipasis = DB::table('partisipasis')->pluck('id');

      if ($unsurs->isEmpty() || $tingkats->isEmpty() || $partisipasis->isEmpty()) {
         $this->command->warn(
            'Pastikan UnsurSeeder, TingkatSeeder, PartisipasiSeeder sudah dijalankan dulu.',
         );
         return;
      }

      // Sub unsurs di-group berdasarkan unsur_id
      $subUnsursGrouped = DB::table('sub_unsurs')->get()->groupBy('unsur_id');

      $totalTarget = 100;
      $unsurCount = $unsurs->count();

      // Bagi 100 merata ke tiap unsur, sisa dibagikan ke unsur pertama
      $basePerUnsur = intdiv($totalTarget, $unsurCount);
      $remainder = $totalTarget % $unsurCount;

      $skpDetails = [];
      $counter = 1;

      foreach ($unsurs as $index => $unsur) {
         $jumlahPerUnsur = $basePerUnsur + ($index < $remainder ? 1 : 0);

         // Sub unsurs yang sesuai dengan unsur ini
         $subUnsurs = $subUnsursGrouped->get($unsur->id);

         for ($i = 0; $i < $jumlahPerUnsur; $i++) {
            // Sub unsur nullable, ambil random dari sub unsur milik unsur ini (atau null)
            $subUnsurId = $subUnsurs && $subUnsurs->isNotEmpty() ? $subUnsurs->random()->id : null;

            // Tingkat nullable, 70% chance diisi, 30% null
            $tingkatId = rand(1, 10) <= 7 ? $tingkats->random() : null;

            $skpDetails[] = [
               'name' => "SKP Detail {$counter} - {$unsur->name}",
               'bobot' => rand(5, 10),
               'unsur_id' => $unsur->id,
               'sub_unsur_id' => $subUnsurId,
               'tingkat_id' => $tingkatId,
               'partisipasi_id' => $partisipasis->random(),
               'created_at' => now(),
               'updated_at' => now(),
            ];

            $counter++;
         }
      }

      DB::table('skp_details')->insert($skpDetails);

      $this->command->info("Berhasil insert {$totalTarget} SKP Detail.");
   }
}
