<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SkpSeeder extends Seeder
{
   public function run(): void
   {
      $users = DB::table('users')->where('role', 'mahasiswa')->take(5)->get();
      $semesters = DB::table('semesters')->pluck('id');
      $skpDetails = DB::table('skp_details')->pluck('id');
      $adminId = DB::table('users')->where('role', 'admin')->first()?->id;

      if ($users->isEmpty() || $semesters->isEmpty() || $skpDetails->isEmpty()) {
         $this->command->warn(
            'Pastikan UserSeeder, SemesterSeeder, SkpDetailSeeder sudah dijalankan dulu.',
         );
         return;
      }

      if (!$adminId) {
         $this->command->warn('Tidak ada user admin, pastikan ada user dengan role true.');
         return;
      }

      $kegiatan = [
         'Seminar Nasional Teknologi Informasi',
         'Workshop Machine Learning',
         'Lomba Karya Tulis Ilmiah',
         'Pelatihan Public Speaking',
         'Konferensi Internasional AI',
         'Olimpiade Matematika',
         'Hackathon Nasional',
         'Webinar Data Science',
         'Kompetisi Desain UI/UX',
         'Pelatihan Kepemimpinan',
      ];

      $lokasi = [
         'Jakarta',
         'Bandung',
         'Surabaya',
         'Yogyakarta',
         'Bali',
         'Makassar',
         'Medan',
         'Online/Daring',
      ];

      $komentarAdmin = [
         'Sertifikat tidak terbaca dengan jelas, mohon upload ulang dengan resolusi lebih tinggi.',
         'Format sertifikat tidak sesuai ketentuan, harap gunakan format PDF.',
         'Tanggal kegiatan tidak sesuai dengan semester yang dipilih.',
         'Nama pada sertifikat tidak sesuai dengan nama mahasiswa terdaftar.',
         'Sertifikat terlihat tidak resmi, mohon lampirkan surat keterangan dari penyelenggara.',
      ];

      $balasanMahasiswa = [
         'Baik pak/bu, saya akan segera memperbaiki dan upload ulang.',
         'Terima kasih infonya, saya akan segera mengurus dokumen tersebut.',
         'Mohon maaf atas ketidaknyamanannya, saya akan perbaiki secepatnya.',
         'Baik bu/pak, apakah ada format khusus yang harus saya gunakan?',
         'Saya sudah upload ulang, mohon dicek kembali pak/bu.',
      ];

      foreach ($users as $user) {
         for ($i = 0; $i < 4; $i++) {
            $startDate = Carbon::now()->subMonths(rand(1, 6))->subDays(rand(0, 20));
            $endDate = $startDate->copy()->addDays(rand(1, 5));

            // 30% rejected, 40% approved, 30% pending
            $status = collect([
               'rejected',
               'rejected',
               'rejected',
               'approved',
               'approved',
               'approved',
               'approved',
               'pending',
               'pending',
               'pending',
            ])->random();

            $skpId = DB::table('skps')->insertGetId([
               'name' => $kegiatan[array_rand($kegiatan)],
               'location' => $lokasi[array_rand($lokasi)],
               'start_date' => $startDate->toDateString(),
               'end_date' => $endDate->toDateString(),
               'certificate' => "certificates/dummy_{$user->id}_{$i}.pdf",
               'status' => $status,
               'user_id' => $user->id,
               'semester_id' => $semesters->random(),
               'skp_detail_id' => $skpDetails->random(),
               'created_at' => now(),
               'updated_at' => now(),
            ]);

            // Kalau rejected, wajib ada komentar admin
            if ($status === 'rejected') {
               $adminCommentId = DB::table('comments')->insertGetId([
                  'skp_id' => $skpId,
                  'user_id' => $adminId,
                  'body' => $komentarAdmin[array_rand($komentarAdmin)],
                  'parent_id' => null,
                  'created_at' => now(),
                  'updated_at' => now(),
               ]);

               // 50% chance mahasiswa balas komentar admin
               if (rand(0, 1)) {
                  DB::table('comments')->insert([
                     'skp_id' => $skpId,
                     'user_id' => $user->id,
                     'body' => $balasanMahasiswa[array_rand($balasanMahasiswa)],
                     'parent_id' => $adminCommentId,
                     'created_at' => now(),
                     'updated_at' => now(),
                  ]);
               }
            }
         }
      }

      $this->command->info('Berhasil insert 20 SKP untuk 5 mahasiswa.');
   }
}
