<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $majors = DB::table('majors')->select('id', 'faculty_id')->get();

      $faculties = DB::table('faculties')->get(['id', 'name']);

      if ($majors->isEmpty()) {
         $this->command->warn('Tabel majors masih kosong, jalankan MajorSeeder dulu.');
         return;
      }

      $users = [];

      for ($nim = 2408561001; $nim <= 2408561144; $nim++) {
         $major = $majors->random();

         $users[] = [
            'name' => 'Mahasiswa ' . $nim,
            'nim' => (string) $nim,
            'picture' => null,
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'major_id' => $major->id,
            'faculty_id' => $major->faculty_id,
            'created_at' => now(),
            'updated_at' => now(),
         ];
      }

      foreach ($faculties as $item) {
         $users[] = [
            'name' => 'BEM ' . $item->name,
            'nim' => 'BEM ' . $item->name,
            'picture' => null,
            'password' => Hash::make('password'),
            'role' => 'admin',
            'major_id' => null,
            'faculty_id' => $item->id,
            'created_at' => now(),
            'updated_at' => now(),
         ];
      }
      DB::table('users')->insert($users);
   }
}
