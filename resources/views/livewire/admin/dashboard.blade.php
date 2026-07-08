<div class="min-h-screen">
   <x-header-dashboard 
      title="Dashboard Admin"  
   />

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
                  wire:navigate
                  href="{{ route('admin.verifikasi-skp') }}"
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
               <x-empty-table 
                title="Belum Ada Sertifikat yang berstatus 'pending'"
                message="Belum ada mahasiswa yang menginputkan Sertifikat, atau Sertifikat yang Anda cari tidak ditemukan dalam database."/>
            @endforelse
         </div>
      </div>
   </div>
</div>
