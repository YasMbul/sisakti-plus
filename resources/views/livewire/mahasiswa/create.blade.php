<div class="min-h-screen">
   {{-- Header Page --}}
   <div
      class="flex items-center justify-between border-b border-stone-200 bg-white py-6 pr-7 pl-11"
   >
      <div>
         <h1 class="text-2xl font-bold text-stone-900">
            {{
               $isEdit
                  ? 'Edit Sertifikat SKP'
                  : 'Upload Sertifikat Baru'
            }}
         </h1>
         <p class="text-sm text-stone-500">Isi formulir berikut dengan data yang valid untuk mengajukan SKP Anda.</p>
      </div>
      <div>
         <a
            href="{{ route('mahasiswa.daftar') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-stone-100 px-4 py-2 text-sm font-semibold text-stone-700 shadow-sm transition duration-200 hover:bg-stone-200"
         >
            &larr; Kembali ke Daftar
         </a>
      </div>
   </div>

   {{-- Main Container --}}
   <div class="flex h-192 items-stretch gap-4 bg-stone-50 py-4 pr-7 pl-11">
      <div class="flex-1 font-sans">
         {{-- Alert Success / Error --}}
         @if (session()->has('success'))
            <div
               class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-800"
            >
               {{ session('success') }}
            </div>
         @endif
         @if (session()->has('error'))
            <div
               class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-800"
            >
               {{ session('error') }}
            </div>
         @endif

         <div class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm md:p-8">
            <form wire:submit.prevent="saveCertificate" class="space-y-6">
               {{-- Nama Kegiatan --}}
               <div class="flex flex-col gap-1.5">
                  <x-input
                     name="Nama Kegiatan"
                     type="text"
                     label="Nama Kegiatan"
                     wire:model="nama_kegiatan"
                     border-class="border-gray-300 focus:border-gray-500"
                     placeholder="Seminar AI & Machine Learning 2026"
                  />
               </div>

               {{-- Kategori SKP --}}
               <x-select-search
                  name="kategori_skp"
                  label="Kategori SKP"
                  placeholder="Pilih Kategori SKP"
                  :selected="$kategori_skp"
                  :options="
                     $detail
      ->map(
         fn($sub) => [
            'id' => $sub->id,
            'label' => $sub->unsur->name . ' - ' . $sub->name,
            ' - ' . $sub->bobot,
         ],
      )
      ->values()
                  "
               />

               {{-- Tempat & Semester --}}
               <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                  <div class="flex flex-col gap-1.5">
                     <x-input
                        name="tempat kegiatan"
                        type="text"
                        label="Tempat Kegiatan"
                        wire:model="tempat_kegiatan"
                        border-class="border-gray-300 focus:border-gray-500"
                        placeholder="Universitas Indonesia, Depok"
                     />
                  </div>

                  <div class="flex flex-col gap-1.5">
                     <x-select
                        name="semester"
                        label="Semester Kegiatan"
                        placeholder="Pilih Semester"
                        :options="$semesters"
                        wire:model="semester"
                        placeholder="Pilih Semester"
                     />
                  </div>
               </div>

               {{-- Tanggal Mulai & Selesai --}}
               <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                  <x-input
                     name="tgl_mulai"
                     type="date"
                     label="Tanggal Dimulai Kegiatan"
                     wire:model="tgl_mulai"
                     border-class="border-gray-300 focus:border-gray-500"
                  />

                  <x-input
                     name="tgl_selesai"
                     type="date"
                     label="Tanggal Selesai Kegiatan"
                     wire:model="tgl_selesai"
                     border-class="border-gray-300 focus:border-gray-500"
                  />
               </div>

               {{-- Lampiran Sertifikat --}}
               <div class="flex flex-col gap-1.5">
                  <label class="text-[11px] font-bold tracking-wide text-stone-600 uppercase">
                     Lampiran Kegiatan (File PDF)
                  </label>

                  {{-- Drag & Drop Area --}}
                  <div
                     class="w-full px-6 py-8 bg-white rounded-2xl border-2 border-dashed @error('sertifikat') border-red-400 bg-red-50/50 @else border-stone-300 hover:bg-stone-50 @enderror flex flex-col items-center justify-center gap-2 transition cursor-pointer relative"
                  >
                     <input
                        type="file"
                        wire:model="sertifikat"
                        class="absolute inset-0 h-full w-full cursor-pointer opacity-0"
                        accept="application/pdf"
                     />
                     <div class="text-3xl text-stone-700">
                        <img
                           src="{{ asset('assets/images/Vector.png') }}"
                           alt="PDF Icon"
                           srcset=""
                        />
                     </div>
                     <div class="text-sm font-semibold text-stone-900">
                        {{
                           $sertifikat
                              ? $sertifikat->getClientOriginalName()
                              : 'Pilih File Sertifikat'
                        }}
                     </div>
                     <div class="text-center text-xs text-stone-400">
                        Klik atau drag & drop file PDF (maks. 5MB)
                     </div>

                     <div
                        wire:loading
                        wire:target="sertifikat"
                        class="mt-2 animate-pulse text-xs font-semibold text-teal-900"
                     >
                        Mengunggah file...
                     </div>
                  </div>

                  {{-- Existing File Notice --}}
                  @if ($isEdit && $existing_sertifikat)
                     <div
                        class="mt-2 flex items-center gap-1.5 rounded-lg bg-stone-100 px-3 py-2 text-xs text-stone-500"
                     >
                        <span>📄</span>
                        <span class="font-medium">Sertifikat saat ini:</span>
                        <a
                           href="{{ asset('storage/' . $existing_sertifikat) }}"
                           target="_blank"
                           class="font-semibold text-teal-700 underline hover:text-teal-900"
                        >
                           Lihat File
                        </a>
                        <span class="text-[10px] text-stone-400"
                           >(Unggah file baru jika ingin mengganti)</span
                        >
                     </div>
                  @endif

                  @error ('sertifikat')
                     <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                  @enderror
               </div>

               {{-- Submit Button --}}
               <div class="flex justify-end pt-4">
                  <button
                     type="submit"
                     class="inline-flex items-center gap-2 rounded-md bg-teal-900 px-6 py-2.5 font-semibold text-white shadow-md transition duration-200 hover:bg-teal-950 focus:ring-2 focus:ring-teal-700 focus:ring-offset-2 focus:outline-none"
                  >
                     <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                        <path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z" />
                     </svg>
                     <span>{{
                        $isEdit
                           ? 'Simpan Perubahan'
                           : 'Upload Sertifikat'
                     }}</span>
                  </button>
               </div>
            </form>
         </div>
      </div>

      {{-- @dump ($sertifikat) --}}
      {{-- @dd ($isEdit, $skpId) --}}
      @if ($isEdit && $skpId)
         <livewire:chat
            skpId="{{ $skpId }}"
            bubbleClass="flex-1"
            containerClass="w-full! flex-1 self-stretch"
         />
      @endif
   </div>

   {{-- Footer Dashboard --}}
   <x-footer></x-footer>
</div>
