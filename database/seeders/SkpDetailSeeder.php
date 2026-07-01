<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkpDetailSeeder extends Seeder
{
   public function run(): void
   {
      $unsurs = DB::table('unsurs')->get();
      $tingkats = DB::table('tingkats')->get();
      $partisipasis = DB::table('partisipasis')->get();

      if ($unsurs->isEmpty()) {
         $this->command->warn(
            'Pastikan UnsurSeeder, TingkatSeeder, PartisipasiSeeder sudah dijalankan dulu.',
         );
         return;
      }

      $subUnsursGrouped = DB::table('sub_unsurs')->get()->groupBy('unsur_id');

      $tingkatNames = $tingkats->pluck('name', 'id');
      $partisipasiNames = $partisipasis->pluck('name', 'id');

      $tingkatIds = $tingkats->pluck('id');
      $partisipasiIds = $partisipasis->pluck('id');

      $totalTarget = 100;
      $unsurCount = $unsurs->count();
      $basePerUnsur = intdiv($totalTarget, $unsurCount);
      $remainder = $totalTarget % $unsurCount;

      $skpDetails = [];
      $usedNames = [];
      $counter = 0;
      $maxAttempts = 1000;

      foreach ($unsurs as $index => $unsur) {
         $jumlahPerUnsur = $basePerUnsur + ($index < $remainder ? 1 : 0);
         $subUnsurs = $subUnsursGrouped->get($unsur->id);
         $inserted = 0;
         $attempts = 0;

         while ($inserted < $jumlahPerUnsur && $attempts < $maxAttempts) {
            $attempts++;

            $subUnsur = $subUnsurs && $subUnsurs->isNotEmpty() ? $subUnsurs->random() : null;

            $tingkatId = rand(1, 10) <= 7 ? $tingkatIds->random() : null;
            $partisipasiId = rand(1, 10) <= 7 ? $partisipasiIds->random() : null;

            $nameParts = [
               $unsur->name,
               $subUnsur ? $subUnsur->name : 'Tidak Ada',
               $tingkatId ? $tingkatNames[$tingkatId] : 'Tidak Ada',
               $partisipasiId ? $partisipasiNames[$partisipasiId] : 'Tidak Ada',
            ];

            $name = implode(' - ', $nameParts);

            if (in_array($name, $usedNames)) {
               continue;
            }

            $usedNames[] = $name;

            $skpDetails[] = [
               'name' => $name,
               'bobot' => rand(5, 10),
               'unsur_id' => $unsur->id,
               'sub_unsur_id' => $subUnsur?->id,
               'tingkat_id' => $tingkatId,
               'partisipasi_id' => $partisipasiId,
               'created_at' => now(),
               'updated_at' => now(),
            ];

            $inserted++;
            $counter++;
         }

         if ($attempts >= $maxAttempts) {
            $this->command->warn(
               "Kombinasi unik habis untuk unsur: {$unsur->name}, hanya berhasil insert {$inserted}/{$jumlahPerUnsur}.",
            );
         }
      }

      DB::table('skp_details')->insert($skpDetails);

      $this->command->info("Berhasil insert {$counter} SKP Detail.");
   }
}
