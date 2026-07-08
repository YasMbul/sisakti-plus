<div class="min-h-screen">
   <x-header-dashboard 
      title="Verifikasi SKP"  
   />

   {{-- Main Content Area --}}
   <div class="bg-background space-y-4 py-7 pr-7 pl-11">
      <div class="border-border-custom rounded-2xl border bg-white p-6 shadow-sm">
         <div class="relative w-full md:w-90">
            <span
               class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-stone-400"
            >
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
               <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
               </svg>
            </span>
            <input
               type="text"
               wire:model.live="search"
               placeholder="Cari nama atau nim mahasiswa..."
               class="w-full rounded-lg border border-stone-300 bg-stone-50 py-2 pr-4 pl-9 text-sm transition focus:ring-2 focus:ring-teal-700 focus:outline-none"
            />
         </div>
      </div>
      {{-- Card Container Utama --}}
      <div class="border-border-custom rounded-2xl border bg-white p-6 shadow-sm">
         {{-- Judul Tabel/Sektor --}}
         <div class="mb-6">
            <h3 class="text-base font-bold text-black">Antrian Validasi Terbaru</h3>
         </div>

         {{-- List Items Antrian Validasi --}}
         <div class="space-y-3">
            {{-- Data --}}
            @forelse ($users as $user)
               <div
                  class="border-border-custom hover:bg-border-custom/10 flex items-center justify-between rounded-xl border p-4 transition"
               >
                  <div class="flex items-center gap-4">
                     <div class="size-10 overflow-hidden rounded-xl">
                        <img src="{{ $this->getAvatar($user) }}" alt="Profile Picture" />
                     </div>
                     <div>
                        <h4 class="text-sm font-bold text-black">{{ $user->name }}</h4>
                        <p class="text-subtext-dark-grey mt-0.5 text-xs" />
                        {{ $user->skps->count() }} Sertifikat Belum Diverifikasi</p>
                     </div>
                  </div>
                  <div>
                     <a
                        wire:navigate
                        href="{{ route('admin.verifikasi-skp.show', $user->id) }}"
                        class="bg-status-green/10 text-primary hover:bg-status-green/20 cursor-pointer rounded-lg px-4 py-1.5 text-xs font-semibold transition"
                     >
                        Periksa
                     </a>
                  </div>
               </div>
            @empty
               <div class="flex w-full flex-col items-center justify-center px-4 py-16 text-center">
                  <div class="mb-4 rounded-full bg-slate-50 p-4">
                     <x-icons.file class="fill-subtext-light-grey size-10!" />
                  </div>

                  <h3 class="mb-1 text-base font-bold text-slate-700">
                     Belum Ada Mahasiswa yang menunggu Validasi
                  </h3>

                  <p class="mb-6 max-w-sm text-sm text-slate-500">Belum ada mahasiswa yang menginputkan Sertifikat, atau Sertifikat yang Anda cari tidak ditemukan dalam database.</p>
               </div>
            @endforelse
         </div>

         {{-- Bagian Pagination Terbawah --}}
         <div class="mt-6 flex items-center justify-between pt-2">
            {{-- Tombol Previous --}}
            <button
               wire:click="previousPage"
               wire:loading.attr="disabled"
               @disabled ($users->onFirstPage())
               class="border-border-custom hover:bg-border-custom/10 cursor-pointer rounded-xl border px-4 py-2 text-xs font-bold text-black transition disabled:cursor-not-allowed disabled:opacity-50"
            >
               Previous
            </button>

            {{-- Keterangan Halaman --}}
            <span class="text-primary text-xs font-semibold">
               Page {{ $users->currentPage() }} of {{ $users->lastPage() }}</span
            >

            {{-- Tombol Next --}}
            <button
               wire:click="nextPage"
               wire:loading.attr="disabled"
               @disabled ($users->onLastPage())
               class="border-border-custom hover:bg-border-custom/10 cursor-pointer rounded-xl border px-4 py-2 text-xs font-bold text-black transition disabled:cursor-not-allowed disabled:opacity-50"
            >
               Next
            </button>
         </div>
      </div>
   </div>
</div>
