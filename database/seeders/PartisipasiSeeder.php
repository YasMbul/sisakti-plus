<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartisipasiSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $data = [
         'Juara 1/Medali Emas',
         'Juara 2/Medali Perak',
         'Juara 3/Medali Perunggu',
         'Juara Harapan/Favorit',
         'Lolos Internasional',
         'Lolos Nasional',
         'Lolos Regional',
         'Juara 1/Medali Emas/Ketua',
         'Juara 1/Medali Emas/Anggota',
         'Juara 2/Medali Perak/Ketua',
         'Juara 2/Medali Perak/Anggota',
         'Juara 3/Medali Perunggu/Ketua',
         'Juara 3/Medali Perunggu/Anggota',
         'Juara Harapan/Favorit/Ketua',
         'Juara Harapan/Favorit/Anggota',
         'Lolos Internasional/Ketua',
         'Lolos Internasional/Anggota',
         'Lolos Nasional/Ketua',
         'Lolos Nasional/Anggota',
         'Lolos Regional/Ketua',
         'Lolos Regional/Anggota',
         'Lolos Didanai/Ketua',
         'Lolos Didanai/Anggota',
         'Upload Proposal/Ketua',
         'Upload Proposal/Anggota',
         'Medali Emas Poster/Ketua',
         'Medali Emas Poster/Anggota',
         'Medali Perak Poster/Ketua',
         'Medali Perak Poster/Anggota',
         'Medali Perunggu Poster/Ketua',
         'Medali Perunggu Poster/Anggota',
         'Juara Harapan Poster/Ketua',
         'Juara Harapan Poster/Anggota',
         'Lolos Internasional/Finalis',
         'Lolos Nasional/Finalis',
         'Lolos Regional/Finalis',
         '51-60 sks',
         '35-50 sks',
         '20-34 sks',
         'Pembicara',
         'Peserta',
         'Publikasi Ilmiah/Internasional',
         'Publikasi Ilmiah/Nasional',
         'Publikasi Populer',
         'Ketua BEM',
         'Wakil Ketua BEM',
         'Sekretaris BEM',
         'Bendahara BEM',
         'Koordinator Bidang',
         'Wakil Koordinator Bidang',
         'Anggota Pengurus BEM',
         'Ketua DPM',
         'Wakil Ketua DPM',
         'Sekretaris DPM',
         'Bendahara DPM',
         'Kepala Komisi',
         'Wakil Kepala Komisi',
         'Anggota Pengurus DPM',
         'Ketua UKM',
         'Wakil Ketua UKM',
         'Sekretaris UKM',
         'Bendahara UKM',
         'Anggota Pengurus UKM',
         'Ketua HIMA',
         'Wakil Ketua HIMA',
         'Sekretaris HIMA',
         'Bendahara HIMA',
         'Anggota Pengurus HIMA',
         'Ketua Panitia',
         'Wakil Ketua Panitia',
         'Sekretaris Panitia',
         'Bendahara Panitia',
         'Steering Committee',
         'Koordinator Sie',
         'Anggota Sie',
      ];

      $partisipasi = [];

      foreach ($data as $item) {
         $partisipasi[] = [
            'name' => $item,
            'created_at' => now(),
            'updated_at' => now(),
         ];
      }

      DB::table('partisipasis')->insert($partisipasi);
   }
}
