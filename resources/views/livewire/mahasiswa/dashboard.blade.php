<div class="bg-background min-h-screen flex flex-col">
   {{-- Header Dashboard --}}
   <div class="flex items-center justify-between bg-white py-6 pr-7 pl-11">
      <div>
         <h1 class="text-judul text-2xl font-bold">Dashboard</h1>
         <p class="text-subtext-dark-grey text-sm">Mahasiswa Universitas Udayana</p>
      </div>

      <div class="flex items-center gap-4">
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
   <div class="bg-background flex-1 py-7 pr-7 pl-11">
      {{-- Grid 4 State Cards --}}
      <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
         <x-statecard
            title="Total SKP"
            value="{{ $approvedSkp }}"
            label="{{ round($progressPercent) }}% Syarat SKP Terpenuhi"
            theme="green"
         />
         <x-statecard
            title="Pending"
            value="{{ $pendingSkp }}"
            label="Menunggu Validasi"
            theme="yellow"
         />
         <x-statecard
            title="Disetujui"
            value="{{ $approvedCount }}"
            label="Dari Pengajuan {{ $totalUploaded }} Sertifikat"
            theme="blue"
         />
         <x-statecard
            title="Ditolak"
            value="{{ $rejectedCount }}"
            label="Perlu Diperbaiki"
            theme="red"
         />
      </div>

      {{-- Progress per Katefori dan Sertif Terbaru --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:col-span-2">
         <section class="h-xl w-xl rounded-[19px] bg-white p-6 shadow-sm ring-1 ring-slate-200/80">
            <div class="flex items-center justify-between gap-4">
               <div>
                  <p class="text-base font-semibold text-[#1A1714]">Progress per Kategori</p>
               </div>
               <a href="#" class="text-sm font-medium text-[#1B4D3E] hover:text-[#153a2d]"
                  >Lihat detail →</a
               >
            </div>

            <div class="mt-6 space-y-3">
               @foreach ([
                     [
                        'label' => 'Penalaran Ilmiah',
                        'value' => $valuePenalaranIlmiah,
                        'max' => $BidangPenalaranIlmiah,
                        'color' => 'bg-[#4A8C72]'
                     ],
                     [
                        'label' => 'Minat dan Bakat',
                        'value' => $valueMinatdanBakat,
                        'max' => $BidangMinatdanBakat,
                        'color' => 'bg-[#B8860B]'
                     ],
                     [
                        'label' => 'Organisasi dan Kepanitiaan',
                        'value' => $valueOrganisasidanKepanitiaan,
                        'max' => $BidangOrganisasidanKepanitiaan,
                        'color' => 'bg-[#3B82F6]'
                     ],
                     [
                        'label' => 'Pengabdian pada Masyarakat',
                        'value' => $valuePengabdianpadaMasyarakat,
                        'max' => $BidangPengabdianpadaMasyarakat,
                        'color' => 'bg-[#EF4444]'
                     ]
                  ]
                  as $item)
                  <div>
                     <div
                        class="flex items-center justify-between text-sm font-medium text-slate-700"
                     >
                        <span>{{ $item['label'] }}</span>
                        <span>{{ $item['value'] }} / {{ $item['max'] }}</span>
                     </div>
                     <div class="mt-2 h-3 overflow-hidden rounded-full bg-slate-100">
                        <div
                           class="h-full rounded-full {{ $item['color'] }}"
                           style="width: {{ min(100, ($item['value'] / $item['max']) * 100) }}%"
                        ></div>
                     </div>
                  </div>
               @endforeach
            </div>
         </section>

         <section
            class="w-1.1xl h-xl rounded-[19px] bg-white p-6 shadow-sm ring-1 ring-slate-200/80"
         >
            <div class="flex items-center justify-between gap-4">
               <div>
                  <p class="text-base font-semibold text-[#1A1714]">Sertifikat Terbaru</p>
               </div>
               <a href="#" class="text-sm font-medium text-[#1B4D3E] hover:text-[#153a2d]"
                  >Lihat semua →</a
               >
            </div>

            <div class="mt-6 divide-y divide-slate-200/70">
               @forelse ($recentSkps as $skp)
                  @php
                     $statusMap = [
                        'approved' => ['label' => 'Disetujui', 'badge' => 'bg-emerald-100 text-emerald-800'],
                        'pending' => ['label' => 'Pending', 'badge' => 'bg-amber-100 text-amber-800'],
                        'rejected' => ['label' => 'Ditolak', 'badge' => 'bg-rose-100 text-rose-800'],
                     ];
                     $statusInfo = $statusMap[$skp->status] ?? [
                        'label' => ucfirst($skp->status),
                        'badge' => 'bg-slate-100 text-slate-800',
                     ];
                     $bobot = $skp->skpDetail->bobot ?? 0;
                     $skpLabel =
                        $skp->status === 'rejected'
                           ? '—'
                           : ($skp->status === 'approved'
                              ? '+' . $bobot . ' SKP'
                              : $bobot . ' SKP');
                  @endphp
                  <div class="flex items-center justify-between gap-4 py-4">
                     <div>
                        <p class="font-medium text-slate-900">{{ $skp->name }}</p>
                     </div>
                     <div class="flex items-center gap-4">
                        <p class="text-sm text-slate-500">{{ $skpLabel }}</p>
                        <span
                           class="rounded-full px-3 py-1 text-xs font-semibold {{ $statusInfo['badge'] }}"
                        >
                           {{ $statusInfo['label'] }}
                        </span>
                     </div>
                  </div>
               @empty
                  <p class="py-6 text-center text-sm text-slate-400">Belum ada sertifikat yang diunggah.</p>
               @endforelse
            </div>
         </section>
      </div>
   </div>

   {{-- Footer Dashboard --}}
   <x-footer />
</div>
