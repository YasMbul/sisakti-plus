<div class="bg-background flex max-h-screen min-h-screen flex-col">
   <x-header-dashboard title="Pengaturan SKP" />

   {{-- Main Content --}}
   <div class="bg-background flex-1 py-7 pr-7 pl-11">
      <div class="flex items-start gap-6">
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
                     class="cursor-pointer flex w-full items-start gap-3 rounded-xl px-3 py-3 text-left transition
                            {{ $selectedUnsurId === $unsur->id
                               ? 'bg-primary text-white shadow-sm'
                               : 'text-gray-600 hover:bg-gray-50' }}"
                  >
                     <svg
                        class="mt-0.5 size-4 shrink-0 {{ $selectedUnsurId === $unsur->id ? 'text-white' : 'text-primary' }}"
                        viewBox="0 0 24 24"
                        fill="none"
                     >
                        <path
                           d="M3 7C3 5.89543 3.89543 5 5 5H9.58579C9.851 5 10.1054 5.10536 10.2929 5.29289L11.7071 6.70711C11.8946 6.89464 12.149 7 12.4142 7H19C20.1046 7 21 7.89543 21 9V17C21 18.1046 20.1046 19 19 19H5C3.89543 19 3 18.1046 3 17V7Z"
                           stroke="currentColor"
                           stroke-width="1.8"
                           stroke-linejoin="round"
                        />
                     </svg>
                     <span class="text-xs leading-snug font-semibold">{{ $unsur->name }}</span>
                  </button>
               @empty
                  <p class="px-3 py-6 text-center text-xs text-gray-400">Tidak ada data unsur.</p>
               @endforelse
            </div>
         </div>

         {{-- ══════════════════════════════════
              KOLOM KANAN — Tabel Bobot SKP
         ══════════════════════════════════ --}}
         <div class="min-w-0 flex-1 self-stretch">
            @if (!$selectedUnsurId)
               {{-- Empty state --}}
               <div
                  class="border-border-custom flex h-full min-h-80 flex-col items-center justify-center rounded-2xl border bg-white shadow-sm"
               >
                  <x-empty-table
                     title="Pilih Unsur SKP"
                     message="Klik salah satu unsur di kolom kiri untuk melihat dan mengatur bobot poin SKP."
                     icon="folder"
                  />
               </div>

            @else
               <div
                  class="border-border-custom h-full overflow-hidden rounded-2xl border bg-white shadow-sm"
               >
                  {{-- Card Header --}}
                  <div
                     class="border-border-custom flex items-center justify-between border-b px-6 py-4"
                  >
                     <div>
                        <h2 class="text-sm font-bold text-black">{{ $selectedUnsur->name }}</h2>
                        <p class="text-subtext-dark-grey mt-0.5 text-xs">
                           {{ $skpDetails->count() }} kombinasi bobot SKP
                        </p>
                     </div>
                     <span
                        class="rounded-full border border-dashed border-gray-200 px-3 py-1 text-xs text-gray-400"
                     >
                        Klik ✏️ untuk mengubah bobot
                     </span>
                  </div>

                  {{-- Validation Error --}}
                  @error ('editingBobot')
                     <div class="border-border-custom border-b bg-red-50 px-6 py-2.5">
                        <p class="text-xs font-medium text-red-600">{{ $message }}</p>
                     </div>
                  @enderror

                  {{-- Table --}}
                  <div class="overflow-x-auto">
                     <div class="max-h-[calc(100vh-280px)] overflow-y-auto">
                        <table class="w-full border-collapse text-sm">
                           <thead class="sticky top-0 z-10 bg-gray-50">
                              {{-- sticky header --}}
                              <tr class="border-border-custom border-b bg-gray-50">
                                 <th
                                    class="px-6 py-3 text-left text-xs font-semibold tracking-wide text-gray-500 uppercase"
                                 >
                                    Sub Unsur
                                 </th>
                                 <th
                                    class="px-6 py-3 text-left text-xs font-semibold tracking-wide text-gray-500 uppercase"
                                 >
                                    Tingkat
                                 </th>
                                 <th
                                    class="px-6 py-3 text-left text-xs font-semibold tracking-wide text-gray-500 uppercase"
                                 >
                                    Partisipasi
                                 </th>
                                 <th
                                    class="px-6 py-3 text-right text-xs font-semibold tracking-wide text-gray-500 uppercase"
                                 >
                                    Bobot
                                 </th>
                              </tr>
                           </thead>

                           {{-- Body --}}
                           <tbody class="divide-border-custom divide-y overflow-y-auto">
                              @forelse ($skpDetails as $detail)
                                 <tr
                                    id="row-{{ $detail->id }}"
                                    class="transition hover:bg-gray-50/70"
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
                                          <span
                                             class="inline-block rounded-md bg-violet-50 px-2 py-0.5 text-[11px] font-medium text-violet-600"
                                          >
                                             {{ $detail->tingkat->name }}
                                          </span>
                                       @else
                                          <span class="text-xs text-gray-300">—</span>
                                       @endif
                                    </td>

                                    {{-- Partisipasi --}}
                                    <td class="px-6 py-3.5">
                                       @if ($detail->partisipasi)
                                          <span
                                             class="inline-block rounded-md bg-amber-50 px-2 py-0.5 text-[11px] font-medium text-amber-600"
                                          >
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
                                             <form
                                                wire:submit="saveBobot"
                                                class="flex items-center gap-1.5"
                                             >
                                                <input
                                                   wire:model="editingBobot"
                                                   id="bobot-input-{{ $detail->id }}"
                                                   type="number"
                                                   min="0"
                                                   max="9999"
                                                   class="border-primary text-primary ring-primary/20 w-20 rounded-lg border px-2 py-1 text-center text-sm font-bold ring-2 outline-none"
                                                   autofocus
                                                />
                                                {{-- Simpan --}}
                                                <button
                                                   type="submit"
                                                   id="save-bobot-{{ $detail->id }}"
                                                   class="bg-primary hover:bg-primary/80 rounded-lg p-1.5 text-white transition"
                                                   title="Simpan"
                                                >
                                                   <svg class="size-3.5" viewBox="0 0 24 24" fill="none">
                                                      <path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                      <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                                                   </svg>
                                                </button>
                                             </form>

                                          @else
                                             {{-- View mode --}}
                                             <span
                                                class="min-w-8 text-right text-sm font-bold text-gray-800"
                                             >
                                                {{ $detail->bobot }}
                                             </span>
                                             <button
                                                wire:click="startEdit({{ $detail->id }}, {{ $detail->bobot }})"
                                                id="edit-bobot-{{ $detail->id }}"
                                                class="hover:bg-primary/10 hover:text-primary cursor-pointer rounded-lg p-1.5 text-gray-300 transition"
                                                title="Edit bobot"
                                             >
                                                <svg class="size-3.5" viewBox="0 0 24 24" fill="none">
                                                   <path
                                                      d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13M18.5 2.5C18.8978 2.10218 19.4374 1.87868 20 1.87868C20.5626 1.87868 21.1022 2.10218 21.5 2.5C21.8978 2.89782 22.1213 3.43739 22.1213 4C22.1213 4.56261 21.8978 5.10218 21.5 5.5L12 15L8 16L9 12L18.5 2.5Z"
                                                      stroke="currentColor"
                                                      stroke-width="2"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                   />
                                                </svg>
                                             </button>
                                          @endif
                                       </div>
                                    </td>
                                 </tr>
                              @empty
                                 <tr>
                                    <td colspan="4">
                                       <div
                                          class="flex flex-col items-center justify-center px-6 py-14 text-center"
                                       >
                                          <x-empty-table
                                             title="Tidak ada data bobot"
                                             message="Belum ada SKP Detail untuk unsur ini."
                                             icon="folder"
                                          />
                                       </div>
                                    </td>
                                 </tr>
                              @endforelse
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            @endif
         </div>
      </div>
   </div>
   {{-- Footer --}}
   <x-footer />
</div>
