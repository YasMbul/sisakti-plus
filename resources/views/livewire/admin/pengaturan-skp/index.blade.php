<div>
   {{-- Header --}}
   <div class="flex h-full items-center justify-between bg-white py-6 pr-7 pl-11">
      <div>
         <h1 class="text-judul text-2xl font-bold">Pengaturan SKP</h1>
         <p class="text-subtext-dark-grey text-sm">Mahasiswa Universitas Udayana</p>
      </div>

      <div class="flex items-center gap-4">
         <button class="text-subtext-dark-grey hover:bg-subtext-light-grey/10 relative rounded-full p-2 transition">
            <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
               <circle cx="25.2004" cy="5.73846" r="3.75066" fill="#FF383C" />
               <path d="M23.8593 14.6567C24.731 22.7206 28.1591 25.1586 28.1591 25.1586H1.1543C1.1543 25.1586 5.65509 21.9585 5.65509 10.756C5.65509 8.21005 6.60326 5.76761 8.29106 3.9673C9.97886 2.16698 12.2713 1.1543 14.6567 1.1543C15.1638 1.1543 15.6639 1.1993 16.157 1.28932M17.2521 29.6593C16.9884 30.114 16.6098 30.4915 16.1543 30.7538C15.6988 31.0162 15.1824 31.1543 14.6567 31.1543C14.131 31.1543 13.6146 31.0162 13.1591 30.7538C12.7036 30.4915 12.325 30.114 12.0612 29.6593M25.1586 10.1559C26.3522 10.1559 27.497 9.6817 28.3411 8.83764C29.1852 7.99358 29.6593 6.84878 29.6593 5.65509C29.6593 4.46141 29.1852 3.31661 28.3411 2.47255C27.497 1.62849 26.3522 1.1543 25.1586 1.1543C23.9649 1.1543 22.8201 1.62849 21.976 2.47255C21.1319 3.31661 20.6578 4.46141 20.6578 5.65509C20.6578 6.84878 21.1319 7.99358 21.976 8.83764C22.8201 9.6817 23.9649 10.1559 25.1586 10.1559Z" stroke="black" stroke-width="2.3085" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>
      </div>
   </div>

   {{-- Main Content --}}
   <div class="bg-background py-7 pr-7 pl-11">
      <div class="flex gap-6" style="align-items: flex-start;">

         {{-- ══════════════════════════════════
              KOLOM KIRI — Daftar Unsur
         ══════════════════════════════════ --}}
         <div class="border-border-custom w-64 shrink-0 rounded-2xl border bg-white shadow-sm">
            <div class="border-border-custom border-b px-5 py-4">
               <h2 class="text-sm font-bold text-black">Unsur SKP</h2>
               <p class="text-subtext-dark-grey mt-0.5 text-xs">Pilih unsur untuk melihat bobot</p>
            </div>

            <div class="space-y-1 p-3">
               @forelse ($unsurs as $unsur)
                  <button
                     wire:click="selectUnsur({{ $unsur->id }})"
                     id="unsur-btn-{{ $unsur->id }}"
                     class="flex w-full items-start gap-3 rounded-xl px-3 py-3 text-left transition
                            {{ $selectedUnsurId === $unsur->id
                               ? 'bg-primary text-white shadow-sm'
                               : 'text-gray-600 hover:bg-gray-50' }}"
                  >
                     <svg
                        class="mt-0.5 size-4 shrink-0 {{ $selectedUnsurId === $unsur->id ? 'text-white' : 'text-primary' }}"
                        viewBox="0 0 24 24" fill="none"
                     >
                        <path d="M3 7C3 5.89543 3.89543 5 5 5H9.58579C9.851 5 10.1054 5.10536 10.2929 5.29289L11.7071 6.70711C11.8946 6.89464 12.149 7 12.4142 7H19C20.1046 7 21 7.89543 21 9V17C21 18.1046 20.1046 19 19 19H5C3.89543 19 3 18.1046 3 17V7Z"
                           stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                     </svg>
                     <span class="text-xs font-semibold leading-snug">{{ $unsur->name }}</span>
                  </button>
               @empty
                  <p class="px-3 py-6 text-center text-xs text-gray-400">Tidak ada data unsur.</p>
               @endforelse
            </div>
         </div>

         {{-- ══════════════════════════════════
              KOLOM KANAN — Tabel Bobot SKP
         ══════════════════════════════════ --}}
         <div class="min-w-0 flex-1">

            @if (!$selectedUnsurId)
               {{-- Empty state --}}
               <div class="border-border-custom flex min-h-80 flex-col items-center justify-center rounded-2xl border bg-white shadow-sm">
                  <div class="mb-4 rounded-2xl bg-primary/8 p-5">
                     <svg class="text-primary size-9" viewBox="0 0 24 24" fill="none">
                        <path d="M3 7C3 5.89543 3.89543 5 5 5H9.58579C9.851 5 10.1054 5.10536 10.2929 5.29289L11.7071 6.70711C11.8946 6.89464 12.149 7 12.4142 7H19C20.1046 7 21 7.89543 21 9V17C21 18.1046 20.1046 19 19 19H5C3.89543 19 3 18.1046 3 17V7Z"
                           stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                     </svg>
                  </div>
                  <h3 class="mb-1 text-sm font-bold text-gray-700">Pilih Unsur SKP</h3>
                  <p class="max-w-xs text-center text-xs text-gray-400">
                     Klik salah satu unsur di kolom kiri untuk melihat dan mengatur bobot poin SKP.
                  </p>
               </div>

            @else
               <div class="border-border-custom overflow-hidden rounded-2xl border bg-white shadow-sm">

                  {{-- Card Header --}}
                  <div class="border-border-custom flex items-center justify-between border-b px-6 py-4">
                     <div>
                        <h2 class="text-sm font-bold text-black">{{ $selectedUnsur->name }}</h2>
                        <p class="text-subtext-dark-grey mt-0.5 text-xs">
                           {{ $skpDetails->count() }} kombinasi bobot SKP
                        </p>
                     </div>
                     <span class="rounded-full border border-dashed border-gray-200 px-3 py-1 text-xs text-gray-400">
                        Klik ✏️ untuk mengubah bobot
                     </span>
                  </div>

                  {{-- Validation Error --}}
                  @error('editingBobot')
                     <div class="border-border-custom border-b bg-red-50 px-6 py-2.5">
                        <p class="text-xs font-medium text-red-600">{{ $message }}</p>
                     </div>
                  @enderror

                  {{-- Table --}}
                  <div class="overflow-x-auto">
                     <table class="w-full border-collapse text-sm">
                        {{-- Head --}}
                        <thead>
                           <tr class="border-border-custom border-b bg-gray-50">
                              <th class="px-6 py-3 text-left text-xs font-semibold tracking-wide text-gray-500 uppercase">
                                 Sub Unsur
                              </th>
                              <th class="px-6 py-3 text-left text-xs font-semibold tracking-wide text-gray-500 uppercase">
                                 Tingkat
                              </th>
                              <th class="px-6 py-3 text-left text-xs font-semibold tracking-wide text-gray-500 uppercase">
                                 Partisipasi
                              </th>
                              <th class="px-6 py-3 text-right text-xs font-semibold tracking-wide text-gray-500 uppercase">
                                 Bobot
                              </th>
                           </tr>
                        </thead>

                        {{-- Body --}}
                        <tbody class="divide-border-custom divide-y">
                           @forelse ($skpDetails as $detail)
                              <tr
                                 id="row-{{ $detail->id }}"
                                 class="hover:bg-gray-50/70 transition"
                              >
                                 {{-- Sub Unsur --}}
                                 <td class="px-6 py-3.5">
                                    @if ($detail->subUnsur)
                                       <span class="text-xs font-medium text-gray-700">
                                          {{ $detail->subUnsur->name }}
                                       </span>
                                    @else
                                       <span class="text-xs text-gray-300">—</span>
                                    @endif
                                 </td>

                                 {{-- Tingkat --}}
                                 <td class="px-6 py-3.5">
                                    @if ($detail->tingkat)
                                       <span class="inline-block rounded-md bg-violet-50 px-2 py-0.5 text-[11px] font-medium text-violet-600">
                                          {{ $detail->tingkat->name }}
                                       </span>
                                    @else
                                       <span class="text-xs text-gray-300">—</span>
                                    @endif
                                 </td>

                                 {{-- Partisipasi --}}
                                 <td class="px-6 py-3.5">
                                    @if ($detail->partisipasi)
                                       <span class="inline-block rounded-md bg-amber-50 px-2 py-0.5 text-[11px] font-medium text-amber-600">
                                          {{ $detail->partisipasi->name }}
                                       </span>
                                    @else
                                       <span class="text-xs text-gray-300">—</span>
                                    @endif
                                 </td>

                                 {{-- Bobot --}}
                                 <td class="px-6 py-3.5">
                                    <div class="flex items-center justify-end gap-2">

                                       @if ($editingSkpDetailId === $detail->id)
                                          {{-- Edit mode --}}
                                          <form wire:submit="saveBobot" class="flex items-center gap-1.5">
                                             <input
                                                wire:model="editingBobot"
                                                id="bobot-input-{{ $detail->id }}"
                                                type="number"
                                                min="0"
                                                max="9999"
                                                class="w-20 rounded-lg border border-primary px-2 py-1 text-center text-sm font-bold text-primary outline-none ring-2 ring-primary/20"
                                                autofocus
                                             />
                                             {{-- Simpan --}}
                                             <button
                                                type="submit"
                                                id="save-bobot-{{ $detail->id }}"
                                                class="rounded-lg bg-primary p-1.5 text-white transition hover:bg-primary/80"
                                                title="Simpan"
                                             >
                                                <svg class="size-3.5" viewBox="0 0 24 24" fill="none">
                                                   <path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                             </button>
                                             {{-- Batal --}}
                                             <button
                                                type="button"
                                                wire:click="cancelEdit"
                                                id="cancel-edit-{{ $detail->id }}"
                                                class="rounded-lg border border-gray-200 p-1.5 text-gray-400 transition hover:bg-gray-50"
                                                title="Batal"
                                             >
                                                <svg class="size-3.5" viewBox="0 0 24 24" fill="none">
                                                   <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                                </svg>
                                             </button>
                                          </form>

                                       @else
                                          {{-- View mode --}}
                                          <span class="min-w-[2rem] text-right text-sm font-bold text-gray-800">
                                             {{ $detail->bobot }}
                                          </span>
                                          <button
                                             wire:click="startEdit({{ $detail->id }}, {{ $detail->bobot }})"
                                             id="edit-bobot-{{ $detail->id }}"
                                             class="rounded-lg p-1.5 text-gray-300 transition hover:bg-primary/10 hover:text-primary"
                                             title="Edit bobot"
                                          >
                                             <svg class="size-3.5" viewBox="0 0 24 24" fill="none">
                                                <path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13M18.5 2.5C18.8978 2.10218 19.4374 1.87868 20 1.87868C20.5626 1.87868 21.1022 2.10218 21.5 2.5C21.8978 2.89782 22.1213 3.43739 22.1213 4C22.1213 4.56261 21.8978 5.10218 21.5 5.5L12 15L8 16L9 12L18.5 2.5Z"
                                                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                             </svg>
                                          </button>
                                       @endif

                                    </div>
                                 </td>
                              </tr>
                           @empty
                              <tr>
                                 <td colspan="4">
                                    <div class="flex flex-col items-center justify-center px-6 py-14 text-center">
                                       <div class="mb-3 rounded-full bg-gray-50 p-4">
                                          <svg class="size-7 text-gray-300" viewBox="0 0 24 24" fill="none">
                                             <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15M9 5C9 5.55228 9.44772 6 10 6H14C14.5523 6 15 5.55228 15 5M9 5C9 4.44772 9.44772 4 10 4H14C14.5523 4 15 4.44772 15 5"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                          </svg>
                                       </div>
                                       <p class="text-sm font-semibold text-gray-500">Tidak ada data bobot</p>
                                       <p class="mt-1 text-xs text-gray-400">Belum ada SKP Detail untuk unsur ini.</p>
                                    </div>
                                 </td>
                              </tr>
                           @endforelse
                        </tbody>
                     </table>
                  </div>

               </div>
            @endif

         </div>
         {{-- /Kolom Kanan --}}

      </div>

      {{-- Footer --}}
      <x-footer mt="mt-12" />
   </div>
</div>
