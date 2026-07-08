<div>
   {{-- Header Kelola Akun --}}
   <x-header-dashboard title="Kelola Akun" />

   {{-- Main Content Area --}}
   <div class="bg-background min-h-screen py-7 pr-7 pl-11">
      {{-- Card Container Utama --}}
      <div class="border-border-custom rounded-2xl border bg-white p-6 shadow-sm">
         {{-- Bagian Atas Card: Judul Sektor & Tombol Tambah --}}
         <div class="mb-5 flex items-center justify-between">
            <h3 class="text-base font-bold text-black">Akun Mahasiswa</h3>

            {{-- Tombol Tambah Akun --}}
            <a
               href="/admin/kelola-akun/create"
               class="bg-primary hover:bg-opacity-90 flex cursor-pointer items-center gap-2 rounded-lg px-4 py-2 text-xs font-medium text-white shadow-sm transition"
            >
               <span>Tambah Akun</span>
               <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                  <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
               </svg>
            </a>
         </div>

         {{-- Sub-Tab Bar (Menandakan Halaman Aktif / Filter "Mahasiswa") --}}
         <div class="bg-border-custom/10 border-border-custom mb-4 w-full rounded-xl border p-3">
            <span class="text-primary cursor-pointer px-4 text-sm font-bold"> Mahasiswa </span>
         </div>

         {{-- List Items Data Akun --}}
         <div class="space-y-3">
            {{-- Isi Data Mahasiswa --}}
            @for ($i = 0; $i < 6; $i++)
               <div
                  class="border-border-custom hover:bg-border-custom/10 flex items-center justify-between rounded-xl border p-4 transition"
               >
                  <div class="flex items-center gap-4">
                     <div
                        class="bg-status-green/10 text-primary flex h-10 w-10 items-center justify-center rounded-xl text-sm font-bold tracking-wide"
                     >
                        IO
                     </div>
                     <div>
                        <h4 class="text-sm font-bold text-black">I Nyoman Oka</h4>
                        <p class="text-subtext-dark-grey mt-0.5 text-xs">2408551009</p>
                     </div>
                  </div>
               </div>
            @endfor
         </div>

         {{-- Bagian Pagination Terbawah --}}
         <div class="mt-6 flex items-center justify-between pt-2">
            {{-- Tombol Previous --}}
            <button
               class="border-border-custom hover:bg-border-custom/10 cursor-pointer rounded-xl border px-4 py-2 text-xs font-bold text-black transition"
            >
               Previous
            </button>

            {{-- Keterangan Halaman --}}
            <span class="text-primary text-xs font-semibold"> Page 1 of 7 </span>

            {{-- Tombol Next --}}
            <button
               class="border-border-custom hover:bg-border-custom/10 cursor-pointer rounded-xl border px-4 py-2 text-xs font-bold text-black transition"
            >
               Next
            </button>
         </div>
      </div>
   </div>
</div>
