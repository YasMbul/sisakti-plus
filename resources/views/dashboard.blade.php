@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')
@section('page-heading', 'Dashboard Mahasiswa')

@section('content')
<div class="space-y-6">
    <div class="grid gap-4 xl:grid-cols-[1.6fr_1fr]">
        <div class="grid gap-1 sm:grid-cols-4 xl:col-span-2">
            <article class="w-[275px] h-[116px] rounded-4xl border-t-4 border-[#4A8C72] bg-white p-4 shadow-sm ring-1 ring-slate-200/80">
                <p class="text-sm font-medium text-slate-500">Total SKP</p>
                <div class="mt-4 flex items-end justify-between gap-4">
                    <div>
                        <p class="text-3xl font-semibold text-slate-900">80</p>
                        <p class="mt-1 text-xs text-slate-500">80% Syarat SKP Terpenuhi</p>
                    </div>
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-[#E6F2EC] text-2xl text-[#4A8C72]">80</div>
                </div>
            </article>

            <article class="w-[275px] h-[116px] rounded-4xl border-t-4 border-[#B8860B] bg-white p-4 shadow-sm ring-1 ring-slate-200/80">
                <p class="text-sm font-medium text-slate-500">Pending</p>
                <p class="mt-4 text-3xl font-semibold text-[#B8860B]">3</p>
                <p class="mt-2 text-xs text-slate-500">Menunggu Validasi</p>
            </article>

            <article class="w-[275px] h-[116px] rounded-4xl border-t-4 border-[#2563EB] bg-white p-4 shadow-sm ring-1 ring-slate-200/80">
                <p class="text-sm font-medium text-slate-500">Disetujui</p>
                <p class="mt-4 text-3xl font-semibold text-[#2563EB]">14</p>
                <p class="mt-2 text-xs text-slate-500">Dari 17 Pengajuan Sertifikat</p>
            </article>

            <article class="w-[275px] h-[116px] rounded-4xl border-t-4 border-[#C0392B] bg-white p-4 shadow-sm ring-1 ring-slate-200/80">
                <p class="text-sm font-medium text-slate-500">Ditolak</p>
                <p class="mt-4 text-3xl font-semibold text-[#C0392B]">2</p>
                <p class="mt-2 text-xs text-slate-500">Perlu Diperbaiki</p>
            </article>
        </div>

        <div class="grid gap-1 sm:grid-cols-2 xl:col-span-2">
            <section class="w-[580px] h-[360px] rounded-[19px] bg-white p-6 shadow-sm ring-1 ring-slate-200/80">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-base font-medium text-[#1A1714]">Progress per Kategori</p>
                    </div>
                    <a href="#" class="text-sm font-semibold text-[#1B4D3E] hover:text-[#153a2d]">Lihat detail →</a>
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
                                <div class="h-full rounded-full {{ $item['color'] }}" style="width: {{ min(100, $item['max'] ? round($item['value'] / $item['max'] * 100) : 0) }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="w-[580px] h-[360px] rounded-[19px] bg-white p-6 shadow-sm ring-1 ring-slate-200/80">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-base font-medium text-[#1A1714]">Sertifikat Terbaru</p>
                    </div>
                    <a href="#" class="text-sm font-semibold text-[#1B4D3E] hover:text-[#153a2d]">Lihat semua →</a>
                </div>

                <div class="mt-6 divide-y divide-slate-200/70">
                    @foreach ([
                        ['title' => 'PKKMB Universitas', 'status' => 'Disetujui', 'skp' => '+1 SKP', 'badge' => 'bg-emerald-100 text-emerald-800'],
                        ['title' => 'Seminar AI & ML', 'status' => 'Disetujui', 'skp' => '+3 SKP', 'badge' => 'bg-emerald-100 text-emerald-800'],
                        ['title' => 'Panitia Dies Natalis', 'status' => 'Pending', 'skp' => '5 SKP', 'badge' => 'bg-amber-100 text-amber-800'],
                        ['title' => 'Lomba Hackathon', 'status' => 'Pending', 'skp' => '8 SKP', 'badge' => 'bg-amber-100 text-amber-800'],
                        ['title' => 'Workshop Desain UI', 'status' => 'Ditolak', 'skp' => '—', 'badge' => 'bg-rose-100 text-rose-800'],
                    ] as $item)
                        <div class="flex items-center justify-between gap-4 py-4">
                            <div>
                                <p class="font-semibold text-slate-900">{{ $item['title'] }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <p class="text-sm text-slate-500">{{ $item['skp'] }}</p>
                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $item['badge'] }}">{{ $item['status'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <div class="grid gap-4">
        <section class="w-[1190px] h-[300px] rounded-[19px] bg-white p-6 shadow-sm ring-1 ring-slate-200/80">
            <div>
                <p class="text-base font-medium text-[#1A1714]">Notifikasi Terbaru</p>
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
</div>
@endsection
