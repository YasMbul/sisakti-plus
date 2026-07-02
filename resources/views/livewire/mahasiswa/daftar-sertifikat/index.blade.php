<div class="p-8">
   {{-- Header --}}
   <div class="mb-8 flex items-center justify-between">
      <div>
         <h1 class="text-2xl font-bold text-gray-800">Daftar Sertifikat</h1>
         <p class="text-sm text-gray-500">Mahasiswa Universitas Udayana</p>
      </div>
      <button class="relative">
         <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0" />
         </svg>
         <span class="absolute -top-1 -right-1 h-2.5 w-2.5 rounded-full bg-red-500"></span>
      </button>
   </div>

   {{-- Cards Kategori --}}
   <div class="mb-8 grid grid-cols-4 gap-4">
      {{-- Disetujui / Syarat Terpenuhi --}}
      <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
         <p class="mb-2 text-sm font-medium text-gray-800">PKKMB Universitas Udayana</p>
         <span class="text-xs font-semibold text-green-600">Syarat Terpenuhi →</span>
      </div>

      {{-- Pending 1 --}}
      <div class="rounded-xl border border-yellow-300 bg-white p-4 shadow-sm">
         <p class="mb-2 text-sm font-medium text-gray-800">Program Kreativitas Mahasiswa (Ketua)</p>
         <span class="text-xs font-semibold text-yellow-500">Pending</span>
      </div>

      {{-- Belum Terpenuhi 1 --}}
      <div class="rounded-xl border border-red-300 bg-white p-4 shadow-sm">
         <p class="mb-2 text-sm font-medium text-gray-800">Praktek Kerja Lapangan</p>
         <span class="text-xs font-semibold text-red-500">Belum Terpenuhi</span>
      </div>

      {{-- Belum Terpenuhi 2 --}}
      <div class="rounded-xl border border-red-300 bg-white p-4 shadow-sm">
         <p class="mb-2 text-sm font-medium text-gray-800">Seminar Nasional Teknologi Informasi dan Aplikasinya (Peserta)</p>
         <span class="text-xs font-semibold text-red-500">Belum Terpenuhi</span>
      </div>

      {{-- Pending 2 --}}
      <div class="col-start-2 rounded-xl border border-yellow-300 bg-white p-4 shadow-sm">
         <p class="mb-2 text-sm font-medium text-gray-800">Program Kreativitas Mahasiswa (Anggota)</p>
         <span class="text-xs font-semibold text-yellow-500">Pending</span>
      </div>

      {{-- Belum Terpenuhi 3 --}}
      <div class="rounded-xl border border-red-300 bg-white p-4 shadow-sm">
         <p class="mb-2 text-sm font-medium text-gray-800">Seminar Nasional Teknologi Informasi dan Aplikasinya (Pemakalah)</p>
         <span class="text-xs font-semibold text-red-500">Belum Terpenuhi</span>
      </div>
   </div>

   {{-- Tabel Sertifikat --}}
   <div class="rounded-xl bg-white p-6 shadow-sm">
      {{-- Tab Filter + Tombol Cetak --}}
      <div class="mb-6 flex items-center justify-between">
         <div class="flex w-full gap-6 border-b border-gray-200">
            <button class="border-b-2 border-green-700 pb-3 text-sm font-semibold text-green-700">
               Semua (17)
            </button>
            <button class="pb-3 text-sm text-gray-500 hover:text-gray-700">Disetujui (14)</button>
            <button class="pb-3 text-sm text-gray-500 hover:text-gray-700">Pending (3)</button>
            <button class="pb-3 text-sm text-gray-500 hover:text-gray-700">Ditolak (2)</button>
         </div>
         <button
            class="ml-6 flex shrink-0 items-center gap-2 rounded-lg bg-[#0f3d2e] px-4 py-2.5 text-sm text-white"
         >
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
               <path d="M17 17H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z" />
               <path d="M9 21h6M12 17v4" />
            </svg>
            Cetak SKP
         </button>
      </div>

      {{-- Tabel --}}
      <table class="w-full text-sm">
         <thead>
            <tr class="text-left text-xs tracking-wider text-gray-400 uppercase">
               <th class="w-1/3 pb-3 font-medium">Nama Kegiatan</th>
               <th class="pb-3 font-medium">Kategori</th>
               <th class="pb-3 font-medium">Tanggal</th>
               <th class="pb-3 font-medium">Poin</th>
               <th class="pb-3 font-medium">Status</th>
               <th class="pb-3 font-medium">Aksi</th>
            </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
            {{-- Baris 1 --}}
            <tr class="text-gray-700">
               <td class="py-4 font-medium">PKKMB Universitas Udayana</td>
               <td class="py-4">
                  <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs text-green-700"
                     >Wajib</span
                  >
               </td>
               <td class="py-4 text-gray-500">Agt 2022</td>
               <td class="py-4 font-medium">+1</td>
               <td class="py-4">
                  <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs text-green-700"
                     >Disetujui</span
                  >
               </td>
               <td class="py-4">
                  <button
                     class="rounded-lg border border-gray-300 px-3 py-1.5 text-xs text-gray-600 hover:bg-gray-50"
                  >
                     Lihat
                  </button>
               </td>
            </tr>

            {{-- Baris 2 --}}
            <tr class="text-gray-700">
               <td class="py-4 font-medium">Panitia Dies Natalis 2024</td>
               <td class="py-4">
                  <span class="rounded-full bg-blue-100 px-2.5 py-1 text-xs text-blue-700"
                     >Kepanitiaan</span
                  >
               </td>
               <td class="py-4 text-gray-500">Feb 2024</td>
               <td class="py-4 text-gray-500">5</td>
               <td class="py-4">
                  <span class="rounded-full bg-yellow-100 px-2.5 py-1 text-xs text-yellow-700"
                     >Pending</span
                  >
               </td>
               <td class="py-4">
                  <button
                     class="rounded-lg border border-gray-300 px-3 py-1.5 text-xs text-gray-600 hover:bg-gray-50"
                  >
                     Lihat
                  </button>
               </td>
            </tr>

            {{-- Baris 3 --}}
            <tr class="text-gray-700">
               <td class="py-4 font-medium">Workshop Desain UI/UX</td>
               <td class="py-4">
                  <span class="rounded-full bg-purple-100 px-2.5 py-1 text-xs text-purple-700"
                     >Seminar</span
                  >
               </td>
               <td class="py-4 text-gray-500">Apr 2024</td>
               <td class="py-4 text-gray-400">—</td>
               <td class="py-4">
                  <span class="rounded-full bg-red-100 px-2.5 py-1 text-xs text-red-700"
                     >Ditolak</span
                  >
               </td>
               <td class="py-4">
                  <button
                     class="rounded-lg bg-[#0f3d2e] px-3 py-1.5 text-xs text-white hover:bg-[#0a2e21]"
                  >
                     Edit
                  </button>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
