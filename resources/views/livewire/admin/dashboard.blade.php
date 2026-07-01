<div>
   {{-- Header Dashboard --}}
   <div class="flex items-center justify-between bg-white py-6 pr-7 pl-11">
      <div>
         <h1 class="text-judul text-2xl font-bold">Dashboard Admin</h1>
         <p class="text-subtext-dark-grey text-sm">Mahasiswa Universitas Udayana</p>
      </div>

      <div class="flex items-center gap-4">
         {{-- Tombol Notifikasi --}}
         <button
            class="text-subtext-dark-grey hover:bg-subtext-light-grey/10 relative rounded-full p-2 transition"
         >
            <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
               <circle cx="25.2004" cy="5.73846" r="3.75066" fill="#FF383C" />
               <path d="M23.8593 14.6567C24.731 22.7206 28.1591 25.1586 28.1591 25.1586H1.1543C1.1543 25.1586 5.65509 21.9585 5.65509 10.756C5.65509 8.21005 6.60326 5.76761 8.29106 3.9673C9.97886 2.16698 12.2713 1.1543 14.6567 1.1543C15.1638 1.1543 15.6639 1.1993 16.157 1.28932M17.2521 29.6593C16.9884 30.114 16.6098 30.4915 16.1543 30.7538C15.6988 31.0162 15.1824 31.1543 14.6567 31.1543C14.131 31.1543 13.6146 31.0162 13.1591 30.7538C12.7036 30.4915 12.325 30.114 12.0612 29.6593M25.1586 10.1559C26.3522 10.1559 27.497 9.6817 28.3411 8.83764C29.1852 7.99358 29.6593 6.84878 29.6593 5.65509C29.6593 4.46141 29.1852 3.31661 28.3411 2.47255C27.497 1.62849 26.3522 1.1543 25.1586 1.1543C23.9649 1.1543 22.8201 1.62849 21.976 2.47255C21.1319 3.31661 20.6578 4.46141 20.6578 5.65509C20.6578 6.84878 21.1319 7.99358 21.976 8.83764C22.8201 9.6817 23.9649 10.1559 25.1586 10.1559Z" stroke="black" stroke-width="2.3085" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>

         {{-- Tombol Export Data --}}
         <button
            class="bg-primary hover:bg-opacity-90 flex cursor-pointer items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium text-white shadow-sm transition"
         >
            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M7.6963 1.24463V16.9651M14.7705 8.31885L7.6963 1.24463L0.62207 8.31885" stroke="white" stroke-width="1.76" />
            </svg>
            Export Data
         </button>
      </div>
   </div>

   {{-- main content --}}
   <div class="bg-background py-7 pr-7 pl-11">
      {{-- Grid 4 State Cards --}}
      <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
         {{-- disini taruh foreachnya --}}
         <x-statecard
            title="Antrian Validasi"
            value="{{ $totalPending }}"
            label="Menunggu Validasi"
            theme="yellow"
         />
         <x-statecard
            title="Disetujui Sesi Ini"
            value="{{ $approvedSkps }}"
            label="Sertifikat Mahasiswa"
            theme="green"
         />
         <x-statecard
            title="Ditolak Sesi Ini"
            value="{{ $rejectedSkps }}"
            label="Sertifikat Mahasiswa"
            theme="red"
         />
         <x-statecard
            title="Mahasiswa Aktif"
            value="{{ $totalMahasiswa }}"
            label="Mahasiswa MIPA"
            theme="blue"
         />
      </div>

      {{-- Section Antrian Validasi Terbaru --}}
      <div class="border-border-custom rounded-2xl border bg-white p-6 shadow-sm">
         <div class="mb-6 flex items-center justify-between">
            <h3 class="text-base font-bold text-black">Antrian Validasi Terbaru</h3>
            @if ($sisa > 0)
               <a
                  href="#"
                  class="text-status-green hover:text-primary flex items-center gap-1 text-xs font-semibold transition"
               >
                  Lihat semua ({{ $sisa }}) <span>&rarr;</span>
               </a>
            @endif
         </div>

         {{-- List Items --}}
         <div class="space-y-3">
            {{-- foreach --}}
            {{-- @dump ($validationQueue) --}}
            @forelse ($validationQueue as $skp)
               <div
                  class="border-border-custom hover:bg-border-custom/10 flex items-center justify-between rounded-xl border p-4 transition"
               >
                  <div class="flex items-center gap-4">
                     <div
                        class="bg-status-green/10 text-primary flex h-10 w-10 items-center justify-center rounded-xl text-sm font-bold tracking-wide"
                     >
                        {{-- disini icon yang singkatan nama tu --}}
                        {{ $skp->user->initials() }}
                     </div>
                     <div>
                        <h4 class="text-sm font-bold text-black">{{ $skp->user->name }}</h4>
                        <p class="text-subtext-dark-grey mt-0.5 text-xs">{{
                           $skp->skpDetail->name ??
                              'Nama Kegiatan Tidak Diketahui'
                        }}</p>
                     </div>
                  </div>
                  <div class="flex items-center gap-6">
                     <span class="text-status-green text-xs font-bold">
                        +{{ $skp->skpDetail->bobot }}
                     </span>
                     <div class="flex gap-2">
                        <button
                           class="bg-status-green/20 text-status-green hover:bg-status-green/50 rounded-lg px-3 py-2 text-xs font-medium transition"
                           href="#"
                           wire:confirm="Apakah anda yakin ingin menyetujui sertifikat ini?"
                           wire:click="acceptSkp({{ $skp->id }})"
                        >
                           Setujui
                        </button>
                        <button
                           class="text-status-red rounded-lg bg-red-100 px-3 py-2 text-xs font-medium transition hover:bg-red-200"
                           href="#"
                           {{-- logic untuk tombol tolak --}}
                        >
                           Tolak
                        </button>
                     </div>
                  </div>
               </div>
            @empty
               <div class="flex w-full flex-col items-center justify-center px-4 py-16 text-center">
                  <div class="mb-4 rounded-full bg-slate-50 p-4">
                     <x-icons.file class="fill-subtext-light-grey size-10!" />
                  </div>

                  <h3 class="mb-1 text-base font-bold text-slate-700">
                     Belum Ada Sertifikat yang berstatus "pending"
                  </h3>

                  <p class="mb-6 max-w-sm text-sm text-slate-500">Belum ada mahasiswa yang menginputkan Sertifikat, atau Sertifikat yang Anda cari tidak ditemukan dalam database.</p>
               </div>
            @endforelse
         </div>
      </div>
   </div>
</div>
