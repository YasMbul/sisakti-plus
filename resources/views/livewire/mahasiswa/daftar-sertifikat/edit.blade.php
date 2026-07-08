<div class="flex h-full flex-col">
   {{-- Header --}}
   <div class="flex items-center justify-between px-8 pt-8 pb-6">
      <div>
         <h1 class="text-2xl font-bold text-gray-800">Edit Sertifikat</h1>
         <p class="text-sm text-gray-500">Mahasiswa Universitas Udayana</p>
      </div>
      <button class="relative">
         <x-icons.notifications class="h-5 w-5 text-gray-700" />
      </button>
   </div>

   {{-- Main Content --}}
   <div class="flex min-h-0 flex-1 gap-6 px-8 pb-8">
      {{-- Form Edit Sertifikat --}}
      <div class="flex-1 overflow-y-auto rounded-2xl bg-white p-8 shadow-sm">
         {{-- Nama Kegiatan --}}
         <div class="mb-5">
            <label class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase">
               Nama Kegiatan
            </label>
            <input
               type="text"
               value="Workshop Design UI/UX"
               class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
            />
            <p class="mt-1 text-xs text-gray-400">Tuliskan nama lengkap kegiatan.</p>
         </div>

         {{-- Kategori SKP --}}
         <div class="mb-5">
            <label class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase">
               Kategori SKP
            </label>
            <input
               type="text"
               value="Kegiatan Bidang Penalaran/Ilmiah – Seminar/Workshop/Pelatihan"
               class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
            />
         </div>

         {{-- Tempat Kegiatan --}}
         <div class="mb-5">
            <label class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase">
               Tempat Kegiatan
            </label>
            <input
               type="text"
               value="Gedung LB 1.1, Program Studi Informatika, FMIPA, Universitas Udayana"
               class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
            />
         </div>

         {{-- Tanggal Dimulai & Selesai --}}
         <div class="mb-5 grid grid-cols-2 gap-4">
            <div>
               <label
                  class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase"
               >
                  Tanggal Dimulai Kegiatan
               </label>
               <input
                  type="date"
                  class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
               />
            </div>
            <div>
               <label
                  class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase"
               >
                  Tanggal Selesai Kegiatan
               </label>
               <input
                  type="date"
                  class="w-full rounded-lg border border-green-500 px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
               />
            </div>
         </div>

         {{-- Semester Kegiatan --}}
         <div class="mb-5">
            <label class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase">
               Semester Kegiatan
            </label>
            <select
               class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
            >
               <option value="">Pilih opsi</option>
               <option>Semester 1</option>
               <option>Semester 2</option>
               <option>Semester 3</option>
               <option>Semester 4</option>
               <option>Semester 5</option>
               <option>Semester 6</option>
               <option>Semester 7</option>
               <option>Semester 8</option>
            </select>
         </div>

         {{-- Tingkat Kegiatan --}}
         <div class="mb-5">
            <label class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase">
               Tingkat Kegiatan
            </label>
            <input
               type="text"
               value="Nasional"
               class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-700 focus:border-transparent focus:ring-2 focus:ring-green-600 focus:outline-none"
            />
         </div>

         {{-- Lampiran --}}
         <div class="mb-8">
            <label class="mb-2 block text-xs font-semibold tracking-widest text-gray-500 uppercase">
               Lampiran Kegiatan
            </label>
            <div
               class="flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 p-10 text-center transition hover:border-green-500 hover:bg-green-50"
            >
               <svg class="mb-3 h-8 w-8 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                  <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L19 19M5.636 5.636L5 5M15.5 9.5l-7 7M9 9.5h.01" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6.5l-7 7m7-7H7m6.5 0v6.5" />
               </svg>
               <p class="text-sm font-medium text-gray-600">Upload Sertifikat</p>
               <p class="mt-1 text-xs text-gray-400">Klik atau drag & drop file PDF (maks. 5MB)</p>
            </div>
         </div>

         {{-- Tombol Submit --}}
         <div class="flex justify-end">
            <button
               class="flex items-center gap-2 rounded-xl bg-[#0f3d2e] px-6 py-3 text-sm text-white transition hover:bg-[#0a2e21]"
            >
               <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path d="M12 19V5m0 0l-5 5m5-5l5 5" />
               </svg>
               Upload Sertifikat
            </button>
         </div>
      </div>

      {{-- Chat Admin --}}
      <div class="flex w-96 flex-col overflow-hidden rounded-2xl bg-[#f5f0eb] shadow-sm">
         {{-- Header Chat --}}
         <div class="border-b border-[#e5ded7] px-6 py-5">
            <h2 class="text-lg font-semibold text-gray-700">Admin Ganteng</h2>
         </div>

         {{-- Isi Chat --}}
         <div class="flex-1 space-y-4 overflow-y-auto px-5 py-5">
            {{-- Bubble Admin (kiri) --}}
            <div class="flex justify-start">
               <div
                  class="max-w-xs rounded-2xl rounded-tl-sm bg-white px-4 py-3 text-sm leading-relaxed text-gray-700 shadow-sm"
               >
                  Mohon perbaiki kategori sertifikat menjadi Kegiatan Bidang Penalaran/Ilmiah –
                  Publikasi Ilmiah. Tempat pelaksanaan kegiatan juga belum diisi dengan lengkap dan
                  benar
               </div>
            </div>

            {{-- Bubble Mahasiswa (kanan) --}}
            <div class="flex justify-end">
               <div
                  class="max-w-xs rounded-2xl rounded-tr-sm bg-white px-4 py-3 text-right text-sm leading-relaxed text-gray-700 shadow-sm"
               >
                  Tapi bukannya Workshop seharusnya masuk ke kategori Kegiatan Bidang
                  Penalaran/Ilmiah – Seminar/Workshop/Pelatihan ya min?
               </div>
            </div>
         </div>

         {{-- Input Chat --}}
         <div class="border-t border-[#e5ded7] bg-[#f5f0eb] px-4 py-4">
            <div class="flex items-center gap-3 rounded-full bg-white px-4 py-2.5 shadow-sm">
               <button class="text-gray-400 hover:text-gray-600">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                     <circle cx="12" cy="12" r="10" />
                     <path d="M8 13s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" />
                  </svg>
               </button>
               <input
                  type="text"
                  placeholder=""
                  class="flex-1 bg-transparent text-sm text-gray-700 outline-none"
               />
               <div class="flex items-center gap-2 text-gray-400">
                  <button class="hover:text-gray-600">
                     <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <circle cx="8.5" cy="8.5" r="1.5" />
                        <path d="M21 15l-5-5L5 21" />
                     </svg>
                  </button>
                  <button class="hover:text-gray-600">
                     <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                     </svg>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- Footer --}}
   <div
      class="flex items-center justify-between border-t border-gray-200 px-8 py-4 text-xs text-gray-400"
   >
      <span>© 2026 SISAKTI+</span>
      <div class="flex gap-4">
         <a href="#" class="hover:text-gray-600">Panduan Pengguna</a>
         <a href="#" class="hover:text-gray-600">Kebijakan Layanan</a>
      </div>
   </div>
</div>
