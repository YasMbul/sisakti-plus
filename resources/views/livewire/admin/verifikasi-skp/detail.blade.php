<div class="flex min-h-screen flex-col">
   {{-- Header Page --}}
   <div
      class="flex items-center justify-between border-b border-stone-200 bg-white py-6 pr-7 pl-11"
   >
      <div>
         <h1 class="text-2xl font-bold text-stone-900">Detail Sertifikat SKP</h1>
         <p class="text-sm text-stone-500">Informasi lengkap sertifikat yang diajukan.</p>
      </div>
      <div>
         <a
            href="{{ route('admin.verifikasi-skp.show', $user_id) }}"
            class="inline-flex items-center gap-2 rounded-lg bg-stone-100 px-4 py-2 text-sm font-semibold text-stone-700 shadow-sm transition duration-200 hover:bg-stone-200"
         >
            &larr; Kembali ke Daftar
         </a>
      </div>
   </div>

   {{-- Main Container --}}
   <div class="flex flex-1 items-stretch gap-4 bg-stone-50 py-4 pr-7 pl-11">
      {{-- Informasi SKP --}}
      <div class="flex-1 space-y-5 font-sans">
         <div class="space-y-6 rounded-2xl border border-stone-200 bg-white p-6 shadow-sm md:p-8">
            {{-- Nama Kegiatan --}}
            <div class="flex flex-col gap-1">
               <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                  >Nama Kegiatan</span
               >
               <span class="text-sm text-stone-900">{{ $skp->name }} </span>
            </div>

            {{-- Kategori SKP --}}
            <div class="flex flex-col gap-1">
               <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                  >Kategori SKP</span
               >
               <span class="text-sm text-stone-900">{{ $skp->skpDetail->name }} </span>
            </div>

            {{-- Tempat & Semester --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
               <div class="flex flex-col gap-1">
                  <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                     >Tempat Kegiatan</span
                  >
                  <span class="text-sm text-stone-900">{{ $skp->location }}</span>
               </div>
               <div class="flex flex-col gap-1">
                  <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                     >Semester Kegiatan</span
                  >
                  <span class="text-sm text-stone-900">{{ $skp->semester->name }}</span>
               </div>
            </div>

            {{-- Tanggal --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
               <div class="flex flex-col gap-1">
                  <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                     >Tanggal Dimulai</span
                  >
                  <span class="text-sm text-stone-900">{{
                     $skp->start_date->translatedFormat(
                        'd F Y',
                     )
                  }}</span>
               </div>
               <div class="flex flex-col gap-1">
                  <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                     >Tanggal Selesai</span
                  >
                  <span class="text-sm text-stone-900">{{
                     $skp->end_date->translatedFormat(
                        'd F Y',
                     )
                  }}</span>
               </div>
            </div>

            {{-- Lampiran --}}
            <div class="flex flex-col gap-1">
               <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                  >Lampiran Sertifikat</span
               >
               <a
                  href="{{ asset('storage/' . $skp->certificate) }}"
                  target="_blank"
                  class="text-primary text-sm hover:underline"
               >
                  {{ $skp->certificate }}
               </a>
            </div>

            {{-- Status --}}
            <div class="flex flex-col gap-1">
               <span class="text-[11px] font-bold tracking-wide text-stone-600 uppercase"
                  >Status</span
               >
               <span
                  class="inline-flex w-fit rounded-full bg-stone-100 px-3 py-1 text-xs font-semibold text-stone-600 capitalize"
                  >{{ $skp->status }}</span
               >
            </div>
         </div>
         <div class="flex justify-end gap-3">
            <button
               wire:click="rejectSkp"
               class="inline-flex items-center gap-2 rounded-md bg-red-900 px-6 py-2.5 font-semibold text-white shadow-md transition duration-200 hover:bg-red-950 focus:ring-2 focus:ring-red-700 focus:ring-offset-2 focus:outline-none"
            >
               <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                  <path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z" />
               </svg>
               <span>Tolak</span>
            </button>
            <button
               wire:click="acceptSkp"
               class="bg-primary inline-flex items-center gap-2 rounded-md px-6 py-2.5 font-semibold text-white shadow-md transition duration-200 hover:bg-teal-950 focus:ring-2 focus:ring-teal-700 focus:ring-offset-2 focus:outline-none"
            >
               <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                  <path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z" />
               </svg>
               <span>Terima</span>
            </button>
         </div>
      </div>

      {{-- Chat --}}
      <livewire:chat
         skpId="{{ $skp_id }}"
         bubbleClass="flex-1"
         containerClass="w-full! max-h-191 flex-1 self-stretch"
      />
   </div>

   <x-footer />
</div>
