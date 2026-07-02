<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * SkpDetailSeeder
 *
 * Cara jalankan:
 *   php artisan db:seed --class=SkpDetailSeeder
 *
 * Cara mengisi data $data di bawah:
 *   - 'name'        => string unik (bebas, tapi harus unik antar baris)
 *   - 'bobot'       => integer poin SKP
 *   - 'unsur'       => nama persis dari tabel unsurs
 *   - 'sub_unsur'   => nama persis dari tabel sub_unsurs, atau null
 *   - 'tingkat'     => nama persis dari tabel tingkats, atau null
 *   - 'partisipasi' => nama persis dari tabel partisipasis, atau null
 */
class SkpDetailSeeder extends Seeder
{
    public function run(): void
    {
        // ─────────────────────────────────────────────────────────────
        // REFERENSI NAMA YANG TERSEDIA
        // ─────────────────────────────────────────────────────────────
        //
        // UNSUR (dari UnsurSeeder):
        //   'Kegiatan Bidang Penalaran/Ilmiah'
        //   'Kegiatan Bidang Minat dan Bakat'
        //   'Kegiatan Bidang Organisasi dan Kepanitiaan'
        //   'Kegiatan Bidang Pengabdian pada Masyarakat'
        //
        // TINGKAT (dari TingkatSeeder):
        //   'Internasional', 'Nasional', 'Regional', 'Provinsi',
        //   'Kabupaten/Kota', 'Universitas', 'Fakultas', 'Program Studi'
        //
        // PARTISIPASI: lihat PartisipasiSeeder.php (ada 91 item)
        //
        // SUB UNSUR (dari UnsurSeeder — per unsur):
        //   Penalaran: 'Lomba Penalaran (Individu)', 'Lomba Penalaran Belmawa (Berkelompok)',
        //              'MBKM', 'Seminar/Workshop/Pelatihan', 'Publikasi', 'Menghasilkan HKI/Paten'
        //   Minat Bakat: 'Prestasi Lomba Minat Bakat'
        //   Organisasi: 'Pengurus Lembaga Mahasiswa', 'Kepanitiaan', 'Koordinator Angkatan', 'Supporter Kegiatan'
        //   Pengabdian: 'Pengabdian di Dalam Kampus', 'Pengabdian di Luar Kampus'
        // ─────────────────────────────────────────────────────────────

        $data = [

            // ══════════════════════════════════════════════════════════
            // UNSUR 1: Kegiatan Bidang Penalaran/Ilmiah
            // ══════════════════════════════════════════════════════════

            // Sub Unsur: Lomba Penalaran (Individu)
            [
                'name'        => 'Penalaran Individu - Internasional - Juara 1',
                'bobot'       => 5, // <-- ganti sesuai pedoman SKP
                'unsur'       => 'Kegiatan Bidang Penalaran/Ilmiah',
                'sub_unsur'   => 'Lomba Penalaran (Individu)',
                'tingkat'     => 'Internasional',
                'partisipasi' => 'Juara 1/Medali Emas',
            ],
            [
                'name'        => 'Penalaran Individu - Internasional - Juara 2',
                'bobot'       => 4,
                'unsur'       => 'Kegiatan Bidang Penalaran/Ilmiah',
                'sub_unsur'   => 'Lomba Penalaran (Individu)',
                'tingkat'     => 'Internasional',
                'partisipasi' => 'Juara 2/Medali Perak',
            ],
            [
                'name'        => 'Penalaran Individu - Nasional - Juara 1',
                'bobot'       => 4,
                'unsur'       => 'Kegiatan Bidang Penalaran/Ilmiah',
                'sub_unsur'   => 'Lomba Penalaran (Individu)',
                'tingkat'     => 'Nasional',
                'partisipasi' => 'Juara 1/Medali Emas',
            ],
            // ... tambahkan kombinasi lainnya dengan pola yang sama

            // Sub Unsur: Seminar/Workshop/Pelatihan
            [
                'name'        => 'Seminar - Pembicara',
                'bobot'       => 3,
                'unsur'       => 'Kegiatan Bidang Penalaran/Ilmiah',
                'sub_unsur'   => 'Seminar/Workshop/Pelatihan',
                'tingkat'     => null,
                'partisipasi' => 'Pembicara',
            ],
            [
                'name'        => 'Seminar - Peserta',
                'bobot'       => 1,
                'unsur'       => 'Kegiatan Bidang Penalaran/Ilmiah',
                'sub_unsur'   => 'Seminar/Workshop/Pelatihan',
                'tingkat'     => null,
                'partisipasi' => 'Peserta',
            ],

            // ══════════════════════════════════════════════════════════
            // UNSUR 2: Kegiatan Bidang Minat dan Bakat
            // ══════════════════════════════════════════════════════════

            [
                'name'        => 'Minat Bakat - Internasional - Juara 1',
                'bobot'       => 5,
                'unsur'       => 'Kegiatan Bidang Minat dan Bakat',
                'sub_unsur'   => 'Prestasi Lomba Minat Bakat',
                'tingkat'     => 'Internasional',
                'partisipasi' => 'Juara 1/Medali Emas',
            ],
            // ... tambahkan kombinasi lainnya

            // ══════════════════════════════════════════════════════════
            // UNSUR 3: Kegiatan Bidang Organisasi dan Kepanitiaan
            // ══════════════════════════════════════════════════════════

            [
                'name'        => 'Pengurus Lembaga - Ketua BEM',
                'bobot'       => 4,
                'unsur'       => 'Kegiatan Bidang Organisasi dan Kepanitiaan',
                'sub_unsur'   => 'Pengurus Lembaga Mahasiswa',
                'tingkat'     => null,
                'partisipasi' => 'Ketua BEM',
            ],
            [
                'name'        => 'Kepanitiaan - Ketua Panitia',
                'bobot'       => 3,
                'unsur'       => 'Kegiatan Bidang Organisasi dan Kepanitiaan',
                'sub_unsur'   => 'Kepanitiaan',
                'tingkat'     => null,
                'partisipasi' => 'Ketua Panitia',
            ],
            [
                'name'        => 'Kepanitiaan - Anggota Sie',
                'bobot'       => 1,
                'unsur'       => 'Kegiatan Bidang Organisasi dan Kepanitiaan',
                'sub_unsur'   => 'Kepanitiaan',
                'tingkat'     => null,
                'partisipasi' => 'Anggota Sie',
            ],
            // ... tambahkan kombinasi lainnya

            // ══════════════════════════════════════════════════════════
            // UNSUR 4: Kegiatan Bidang Pengabdian pada Masyarakat
            // ══════════════════════════════════════════════════════════

            [
                'name'        => 'Pengabdian Dalam Kampus - Peserta',
                'bobot'       => 2,
                'unsur'       => 'Kegiatan Bidang Pengabdian pada Masyarakat',
                'sub_unsur'   => 'Pengabdian di Dalam Kampus',
                'tingkat'     => null,
                'partisipasi' => 'Peserta',
            ],
            // ... tambahkan kombinasi lainnya
        ];

        // ─────────────────────────────────────────────────────────────
        // PROSES INSERT — TIDAK PERLU DIUBAH DI BAWAH INI
        // Seeder ini aman dijalankan berulang kali (upsert by name)
        // ─────────────────────────────────────────────────────────────

        $unsurIds       = DB::table('unsurs')->pluck('id', 'name');
        $subUnsurIds    = DB::table('sub_unsurs')->pluck('id', 'name');
        $tingkatIds     = DB::table('tingkats')->pluck('id', 'name');
        $partisipasiIds = DB::table('partisipasis')->pluck('id', 'name');

        $rows    = [];
        $skipped = [];

        foreach ($data as $item) {
            $unsurId = $unsurIds[$item['unsur']] ?? null;
            if (!$unsurId) {
                $skipped[] = "Unsur tidak ditemukan: '{$item['unsur']}'";
                continue;
            }

            $subUnsurId = null;
            if ($item['sub_unsur'] !== null) {
                $subUnsurId = $subUnsurIds[$item['sub_unsur']] ?? null;
                if (!$subUnsurId) {
                    $skipped[] = "Sub Unsur tidak ditemukan: '{$item['sub_unsur']}'";
                    continue;
                }
            }

            $tingkatId = null;
            if ($item['tingkat'] !== null) {
                $tingkatId = $tingkatIds[$item['tingkat']] ?? null;
                if (!$tingkatId) {
                    $skipped[] = "Tingkat tidak ditemukan: '{$item['tingkat']}'";
                    continue;
                }
            }

            $partisipasiId = null;
            if ($item['partisipasi'] !== null) {
                $partisipasiId = $partisipasiIds[$item['partisipasi']] ?? null;
                if (!$partisipasiId) {
                    $skipped[] = "Partisipasi tidak ditemukan: '{$item['partisipasi']}'";
                    continue;
                }
            }

            $rows[] = [
                'name'           => $item['name'],
                'bobot'          => $item['bobot'],
                'unsur_id'       => $unsurId,
                'sub_unsur_id'   => $subUnsurId,
                'tingkat_id'     => $tingkatId,
                'partisipasi_id' => $partisipasiId,
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        if (!empty($rows)) {
            DB::table('skp_details')->upsert(
                $rows,
                ['name'],
                ['bobot', 'sub_unsur_id', 'tingkat_id', 'partisipasi_id', 'updated_at'],
            );
            $this->command->info('Berhasil insert/update ' . count($rows) . ' SKP Detail.');
        }

        if (!empty($skipped)) {
            $this->command->warn(count($skipped) . ' item dilewati:');
            foreach ($skipped as $msg) {
                $this->command->warn('   - ' . $msg);
            }
        }
    }
}
