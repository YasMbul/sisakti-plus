<div class="flex min-h-screen flex-col bg-stone-50">
   {{-- Header Page --}}
   <div
      class="flex items-center justify-between border-b border-stone-200 bg-white py-6 pr-7 pl-11"
   >
      <div>
         <h1 class="text-2xl font-bold text-stone-900">Daftar Sertifikat</h1>
         <p class="text-sm text-stone-500">Kelola riwayat sertifikat SKP yang telah Anda unggah.</p>
      </div>
      <div class="flex items-center gap-3">
         {{-- Tombol Download Kartu SKP --}}
         <a
            href="{{ route('mahasiswa.kartu-skp.download') }}"
            target="_blank"
            class="inline-flex items-center gap-2 rounded-lg border border-teal-900 bg-white px-4 py-2 text-sm font-semibold text-teal-900 transition duration-200 hover:bg-teal-50"
         >
            <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
               <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
            </svg>
            Cetak Kartu SKP
         </a>

         <a
            href="{{ route('mahasiswa.upload') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-teal-900 px-4 py-2 text-sm font-semibold text-white shadow-md transition duration-200 hover:bg-teal-950"
         >
            <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
               <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
            </svg>
            Upload Baru
         </a>
      </div>
   </div>

   {{-- Main Container --}}
   <div class="flex-1 bg-stone-50 py-2 pr-7 pl-11">
      <div class="my-2 w-full space-y-6 font-sans">
         {{-- Flash Alert --}}
         @if (session()->has('success'))
            <div
               class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-800"
            >
               {{ session('success') }}
            </div>
         @endif
         @if (session()->has('error'))
            <div
               class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-800"
            >
               {{ session('error') }}
            </div>
         @endif

         {{-- Filter & Search Card --}}
         <div
            class="flex flex-col items-center justify-between gap-4 rounded-2xl border border-stone-200 bg-white p-4 shadow-sm md:flex-row md:p-6"
         >
            {{-- Search Input --}}
            <div class="relative w-full md:w-72">
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
                  placeholder="Cari nama kegiatan..."
                  class="w-full rounded-lg border border-stone-300 bg-stone-50 py-2 pr-4 pl-9 text-sm transition focus:ring-2 focus:ring-teal-700 focus:outline-none"
               />
            </div>

            {{-- Select Filters --}}
            <div class="flex w-full flex-wrap justify-end gap-4 md:w-auto">
               {{-- Semester Filter --}}
               <select
                  wire:model.live="semesterFilter"
                  class="rounded-lg border border-stone-300 bg-stone-50 px-4 py-2 text-sm transition focus:ring-2 focus:ring-teal-700 focus:outline-none"
               >
                  <option value="">Semua Semester</option>
                  @foreach ($semesters as $sem)
                     <option value="{{ $sem->id }}">{{ $sem->name }}</option>
                  @endforeach
               </select>

               {{-- Status Filter --}}
               <select
                  wire:model.live="statusFilter"
                  class="rounded-lg border border-stone-300 bg-stone-50 px-4 py-2 text-sm transition focus:ring-2 focus:ring-teal-700 focus:outline-none"
               >
                  <option value="">Semua Status</option>
                  <option value="rejected">Ditolak</option>
                  <option value="pending">Menunggu</option>
                  <option value="approved">Disetujui</option>
               </select>
            </div>
         </div>

         {{-- Table Card --}}
         <div class="overflow-hidden rounded-2xl border border-stone-200 bg-white shadow-sm">
            <div class="overflow-x-auto p-2">
               <table class="w-full border-collapse text-left text-sm">
                  <thead>
                     <tr
                        class="border-b border-stone-200 bg-stone-50 text-xs font-bold tracking-wider text-stone-600 uppercase"
                     >
                        <th class="px-6 py-4">Nama Kegiatan</th>
                        <th class="px-6 py-4">Kategori SKP</th>
                        <th class="px-6 py-4">Tempat & Tanggal</th>
                        <th class="px-6 py-4 text-center">Bobot</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                     </tr>
                  </thead>
                  <tbody class="divide-y divide-stone-100 text-stone-900">
                     @forelse ($skps as $skp)
                        <tr class="hover:bg-stone-55/30 transition">
                           {{-- Nama Kegiatan --}}
                           <td class="px-6 py-4">
                              <div class="font-bold text-stone-950">{{ $skp->name }}</div>
                              <div class="mt-0.5 text-xs text-stone-400">
                                 Semester: {{ $skp->semester->name ?? '-' }}
                              </div>
                           </td>

                           {{-- Kategori SKP --}}
                           <td class="max-w-xs px-6 py-4">
                              <span
                                 class="block truncate rounded-md py-1 text-xs font-medium text-stone-700"
                                 title="{{ $skp->skpDetail->name ?? '-' }}"
                              >
                                 {{
                                    $skp->skpDetail->subUnsur->name ??
                                       '-'
                                 }}
                              </span>
                              <span class="mt-1 block text-[10px] text-stone-400"
                                 >Tingkat: {{ $skp->skpDetail->tingkat->name ?? '-' }}</span
                              >
                           </td>

                           {{-- Tempat & Tanggal --}}
                           <td class="px-6 py-4">
                              <div class="text-stone-700">{{ $skp->location }}</div>
                              <div class="mt-0.5 text-[11px] text-stone-400">
                                 {{
                                    \Carbon\Carbon::parse($skp->start_date)->translatedFormat(
                                       'd M Y',
                                    )
                                 }} - {{
                                    \Carbon\Carbon::parse($skp->end_date)->translatedFormat(
                                       'd M Y',
                                    )
                                 }}
                              </div>
                           </td>

                           {{-- Bobot --}}
                           <td class="px-6 py-4 text-center font-bold text-teal-800">
                              +{{ $skp->skpDetail->bobot ?? 0 }} SKP
                           </td>

                           {{-- Status --}}
                           <td class="px-6 py-4 text-center">
                              @if ($skp->status === 'approved')
                                 <span
                                    class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-800"
                                 >
                                    Disetujui
                                 </span>
                              @elseif ($skp->status === 'pending')
                                 <span
                                    class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800"
                                 >
                                    Menunggu
                                 </span>
                              @else
                                 <span
                                    class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-800"
                                 >
                                    Rejected
                                 </span>
                              @endif

                              @if ($skp->note)
                                 <div
                                    class="mt-1 text-[10px] font-medium text-red-500"
                                    title="{{ $skp->note }}"
                                 >
                                    Catatan: {{ Str::limit($skp->note, 20) }}
                                 </div>
                              @endif
                           </td>

                           {{-- Aksi --}}
                           <td class="px-6 py-4 text-center">
                              <div class="flex items-center justify-center gap-2">
                                 {{-- View File --}}
                                 <a
                                    href="{{ asset('storage/' . $skp->certificate) }}"
                                    target="_blank"
                                    class="hover:text-stone-850 rounded-lg p-1.5 text-stone-500 transition hover:bg-stone-100"
                                    title="Lihat Sertifikat"
                                 >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                    <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd" />
                                    </svg>

                                 </a>

                                 @if ($skp->status !== 'approved')
                                    {{-- Edit --}}
                                    <a
                                       href="{{ route('mahasiswa.upload', $skp->id) }}"
                                       class="rounded-lg p-1.5 text-teal-700 transition hover:bg-teal-50 hover:text-teal-900"
                                       title="Edit Data"
                                    >
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                          <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                          <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                                          </svg>


                                    </a>
                                    {{-- Delete --}}
                                    <button
                                       wire:click="delete({{ $skp->id }})"
                                       wire:confirm="Apakah Anda yakin ingin menghapus sertifikat ini?"
                                       class="rounded-lg p-1.5 text-rose-600 transition hover:bg-rose-50 hover:text-rose-800"
                                       title="Hapus Data"
                                    >
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                       <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                                       </svg>

                                    </button>
                                 @endif
                              </div>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="6" class="px-6 py-16 text-center">
                              <div class="text-4xl">📭</div>
                              <div class="mt-3 text-base font-semibold text-stone-800">
                                 Belum Ada Sertifikat
                              </div>
                              <div class="mt-1 text-xs text-stone-400">
                                 Sertifikat yang Anda unggah akan terdaftar di sini.
                              </div>
                              <div class="mt-4">
                                 <a
                                    href="{{ route('mahasiswa.upload') }}"
                                    class="inline-flex items-center gap-2 rounded-lg bg-teal-900 px-4 py-2 text-xs font-semibold text-white transition duration-200 hover:bg-teal-950"
                                 >
                                    Mulai Upload
                                 </a>
                              </div>
                           </td>
                        </tr>
                     @endforelse
                  </tbody>
               </table>
               <div class="mt-6 flex items-center justify-between pt-2">
                  {{-- Tombol Previous --}}
                  <button
                     wire:click="previousPage"
                     wire:loading.attr="disabled"
                     @disabled ($skps->onFirstPage())
                     class="border-border-custom hover:bg-border-custom/10 cursor-pointer rounded-xl border px-4 py-2 text-xs font-bold text-black transition disabled:cursor-not-allowed disabled:opacity-50"
                  >
                     Previous
                  </button>

                  {{-- Keterangan Halaman --}}
                  <span class="text-primary text-xs font-semibold">
                     Page {{ $skps->currentPage() }} of {{ $skps->lastPage() }}</span
                  >

                  {{-- Tombol Next --}}
                  <button
                     wire:click="nextPage"
                     wire:loading.attr="disabled"
                     @disabled ($skps->onLastPage())
                     class="border-border-custom hover:bg-border-custom/10 cursor-pointer rounded-xl border px-4 py-2 text-xs font-bold text-black transition disabled:cursor-not-allowed disabled:opacity-50"
                  >
                     Next
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
   {{-- Footer --}}
   <x-footer />
</div>
