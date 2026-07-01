
<div>
    {{-- Header Dashboard --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white">
        <div>
            <h1 class="text-2xl font-bold text-judul">Dashboard</h1>
            <p class="text-sm text-subtext-dark-grey">Mahasiswa Universitas Udayana</p>
        </div>

        <div class="flex items-center gap-4">
            {{-- Tombol Export Data --}}
            <button class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition shadow-sm text-sm cursor-pointer">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.6963 1.24463V16.9651M14.7705 8.31885L7.6963 1.24463L0.62207 8.31885" stroke="white" stroke-width="1.76" />
                </svg>
                Export Data
            </button>
        </div>
    </div>

    {{-- main content --}}
    <div class="py-7 pl-11 pr-7 bg-background bg-[#E8E4DC]">

        {{-- Grid 4 State Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <x-statecard
                title="Total SKP"
                value="{{ $approvedSkp }}"
                label="{{ round($progressPercent) }}% Syarat SKP Terpenuhi"
                theme="green" />
            <x-statecard
                title="Pending"
                value="{{ $pendingSkp }}"
                label="Menunggu Validasi"
                theme="yellow" />
            <x-statecard
                title="Disetujui"
                value="{{ $approvedCount }}"
                label="Dari Pengajuan {{ $totalUploaded }} Sertifikat"
                theme="blue" />
            <x-statecard
                title="Ditolak"
                value="{{ $rejectedCount }}"
                label="Perlu Diperbaiki"
                theme="red" />
        </div>

        {{-- Progress per Katefori dan Sertif Terbaru --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:col-span-2">
            <section class="w-xl h-xl rounded-[19px] p-6 shadow-sm ring-1 bg-white ring-slate-200/80">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-base font-semibold text-[#1A1714]">Progress per Kategori</p>
                    </div>
                    <a href="#" class="text-sm font-medium text-[#1B4D3E] hover:text-[#153a2d]">Lihat detail →</a>
                </div>

                <div class="mt-6 space-y-3">
                    @foreach ([
                    ['label' => 'Wajib (PKKMB, PKM, dll)', 'value' => 30, 'max' => 30, 'color' => 'bg-[#4A8C72]'],
                    ['label' => 'Organisasi & Kepanitiaan', 'value' => 22, 'max' => 30, 'color' => 'bg-[#B8860B]'],
                    ['label' => 'Seminar & Pelatihan', 'value' => 18, 'max' => 30, 'color' => 'bg-[#3B82F6]'],
                    ['label' => 'Prestasi & Kompetisi', 'value' => 12, 'max' => 20, 'color' => 'bg-[#F59E0B]'],
                    ['label' => 'Pengabdian Masyarakat', 'value' => 0, 'max' => 10, 'color' => 'bg-[#EF4444]'],
                    ] as $item)
                    <div>
                        <div class="flex items-center justify-between text-sm font-medium text-slate-700">
                            <span>{{ $item['label'] }}</span>
                            <span>{{ $item['value'] }} / {{ $item['max'] }}</span>
                        </div>
                        <div class="mt-2 h-3 overflow-hidden rounded-full bg-slate-100">
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <section class="w-1.1xl h-xl rounded-[19px] p-6 shadow-sm ring-1 bg-white ring-slate-200/80">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-base font-semibold text-[#1A1714]">Sertifikat Terbaru</p>
                    </div>
                    <a href="#" class="text-sm font-medium text-[#1B4D3E] hover:text-[#153a2d]">Lihat semua →</a>
                </div>

                <div class="mt-6 divide-y divide-slate-200/70">
                    @forelse ($recentSkps as $skp)
                        @php
                            $statusMap = [
                                'approved' => ['label' => 'Disetujui', 'badge' => 'bg-emerald-100 text-emerald-800'],
                                'pending'  => ['label' => 'Pending', 'badge' => 'bg-amber-100 text-amber-800'],
                                'rejected' => ['label' => 'Ditolak', 'badge' => 'bg-rose-100 text-rose-800'],
                            ];
                            $statusInfo = $statusMap[$skp->status] ?? ['label' => ucfirst($skp->status), 'badge' => 'bg-slate-100 text-slate-800'];
                            $bobot = $skp->skpDetail->bobot ?? 0;
                            $skpLabel = $skp->status === 'rejected' ? '—' : ($skp->status === 'approved' ? '+' . $bobot . ' SKP' : $bobot . ' SKP');
                        @endphp
                        <div class="flex items-center justify-between gap-4 py-4">
                            <div>
                                <p class="font-medium text-slate-900">{{ $skp->name }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <p class="text-sm text-slate-500">{{ $skpLabel }}</p>
                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $statusInfo['badge'] }}">
                                    {{ $statusInfo['label'] }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="py-6 text-sm text-center text-slate-400">Belum ada sertifikat yang diunggah.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </div>

    <div class="py-2 pl-11 pr-7 flex justify-between items-center bg-[#E8E4DC]">
        <section class="w-7xl h-[300px] rounded-[19px] bg-white p-6 shadow-sm ring-1 ring-slate-200/80">
            <div>
                <p class="text-base font-semibold text-[#1A1714]">Notifikasi Terbaru</p>
            </div>

            <div class="mt-6 divide-y divide-slate-200/70">
                @foreach ([
                ['message' => 'Sertifikat Seminar AI disetujui oleh Admin BEM — 3 SKP ditambahkan ke akun kamu.', 'time' => '2 jam lalu', 'dot' => 'bg-[#4A8C72]'],
                ['message' => 'Workshop Desain UI ditolak — Alasan: dokumen tidak terbaca. Silakan upload ulang.', 'time' => '5 jam lalu', 'dot' => 'bg-rose-500'],
                ['message' => 'Pengingat: kategori Pengabdian Masyarakat belum ada sertifikat.', 'time' => '1 hari lalu', 'dot' => 'bg-amber-500'],
                ] as $item)
                <div class="flex items-start gap-3 py-4">
                    <div class="mt-1 h-2.5 w-2.5 rounded-full {{ $item['dot'] }}"></div>
                    <div class="min-w-0">
                        <p class="text-sm text-slate-900">{{ $item['message'] }}</p>
                        <p class="mt-2 text-xs text-slate-500">{{ $item['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    {{-- Footer Dashboard  --}}
    <div class="py-1 pl-18 pb-24 pt-8 flex justify-between items-center bg-[#E8E4DC]">
        <p class="text-sm text-slate-500">© 2026 SISAKTI+
            <button class="text-[#1B4D3E] hover:text-[#153a2d] pl-180">Kebijakan Privasi</button>
            <button class="text-[#1B4D3E] hover:text-[#153a2d] pl-10">Panduan Pengguna</button>
        </p>
    </div>
</div>
