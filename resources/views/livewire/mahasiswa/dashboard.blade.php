
@extends('layouts.user-layout')

@section('title', 'Dashboard Mahasiswa')
{{-- @section('page-heading', 'Dashboard Mahasiswa') --}}

@section('content')
<div>
    {{-- Header Dashboard --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white border-b border-stone-200">
        <div>
            <h1 class="text-2xl font-bold text-stone-900">Dashboard Mahasiswa</h1>
            <p class="text-sm text-stone-500">Selamat datang kembali, {{ $user->name }}!</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden md:block">
                <div class="text-xs font-bold text-stone-400 uppercase">Program Studi</div>
                <div class="text-sm font-semibold text-stone-800">{{ $user->major->name ?? 'Belum Diatur' }}</div>
            </div>
            <div class="h-8 w-px bg-stone-200 hidden md:block"></div>
            <a href="{{ route('mahasiswa.upload') }}" class="flex items-center gap-2 bg-teal-900 text-white px-4 py-2 rounded-lg font-medium hover:bg-teal-950 transition shadow-sm text-sm cursor-pointer">
                ➕ Upload Sertifikat
            </a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="py-8 pl-11 pr-7 bg-stone-50 min-h-screen">
        <div class="w-full max-w-6xl my-2 font-sans space-y-8">
            
            {{-- Grid 4 State Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Approved SKP --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-stone-400 uppercase tracking-wider">SKP Disetujui</span>
                            <span class="text-xl">🟢</span>
                        </div>
                        <h2 class="text-3xl font-extrabold text-stone-900 mt-2">{{ $approvedSkp }}</h2>
                    </div>
                    <div class="text-xs text-emerald-700 font-semibold mt-4">
                        Poin SKP Terverifikasi
                    </div>
                </div>

                {{-- Pending SKP --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-stone-400 uppercase tracking-wider">Menunggu Validasi</span>
                            <span class="text-xl">🟡</span>
                        </div>
                        <h2 class="text-3xl font-extrabold text-stone-900 mt-2">{{ $pendingSkp }}</h2>
                    </div>
                    <div class="text-xs text-amber-700 font-semibold mt-4">
                        Menunggu Review BEM
                    </div>
                </div>

                {{-- Total Uploaded --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-stone-400 uppercase tracking-wider">Total Sertifikat</span>
                            <span class="text-xl">📄</span>
                        </div>
                        <h2 class="text-3xl font-extrabold text-stone-900 mt-2">{{ $totalUploaded }}</h2>
                    </div>
                    <div class="text-xs text-blue-700 font-semibold mt-4">
                        Jumlah Pengajuan
                    </div>
                </div>

                {{-- Progress Bar Card --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-stone-400 uppercase tracking-wider">Pencapaian Target</span>
                            <span class="text-xs font-bold text-stone-500">{{ $approvedSkp }}/{{ $targetSkp }} Poin</span>
                        </div>
                        <h2 class="text-3xl font-extrabold text-stone-900 mt-2">{{ round($progressPercent) }}%</h2>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-stone-100 rounded-full h-2">
                            <div class="bg-teal-700 h-2 rounded-full transition-all duration-500" style="width: {{ $progressPercent }}%"></div>
                        </div>
                        <div class="text-[10px] text-stone-400 mt-1">Target kelulusan: 100 SKP</div>
                    </div>
                </div>

            </div>

            {{-- Split Content --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Recent Submissions --}}
                <div class="lg:col-span-2 bg-white rounded-2xl border border-stone-200 p-6 shadow-sm space-y-4">
                    <div class="flex justify-between items-center pb-2 border-b border-stone-100">
                        <h3 class="text-base font-bold text-stone-900">Pengajuan Terbaru</h3>
                        <a href="{{ route('mahasiswa.daftar') }}" class="text-xs font-semibold text-teal-700 hover:text-teal-900 transition">
                            Lihat Semua &rarr;
                        </a>
                    </div>

                    <div class="space-y-3">
                        @forelse($recentSkps as $skp)
                            <div class="flex items-center justify-between p-4 border border-stone-200 rounded-xl hover:bg-stone-50 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-stone-100 flex items-center justify-center text-lg">
                                        📄
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-stone-950">{{ $skp->name }}</h4>
                                        <p class="text-xs text-stone-400 mt-0.5">
                                            {{ $skp->skpDetail->subUnsur->name ?? '-' }} &mdash; {{ $skp->location }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="text-xs font-bold text-teal-800">
                                        +{{ $skp->skpDetail->bobot ?? 0 }} SKP
                                    </span>
                                    @if($skp->status === 'approved')
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-semibold">
                                            Disetujui
                                        </span>
                                    @else
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 font-semibold">
                                            Menunggu
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="py-8 text-center text-stone-400 text-sm">
                                Belum ada sertifikat yang diupload. <br>
                                <a href="{{ route('mahasiswa.upload') }}" class="text-teal-700 hover:underline font-semibold mt-2 inline-block">Mulai Upload Sekarang</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Guidance Card --}}
                <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm space-y-4">
                    <div class="pb-2 border-b border-stone-100">
                        <h3 class="text-base font-bold text-stone-900">Panduan Satuan Kredit Prestasi (SKP)</h3>
                    </div>
                    
                    <div class="space-y-4 text-xs text-stone-600 leading-relaxed">
                        <p>SKP wajib dikumpulkan oleh seluruh mahasiswa sebagai salah satu prasyarat kelulusan (Sidang Tugas Akhir / Skripsi).</p>
                        
                        <div class="space-y-2">
                            <div class="font-bold text-stone-800 uppercase tracking-wider text-[10px]">Ketentuan Umum:</div>
                            <ul class="list-disc pl-4 space-y-1">
                                <li><strong>Target Kelulusan:</strong> Min. 100 Poin SKP.</li>
                                <li>Setiap pengajuan sertifikat wajib melampirkan berkas bukti asli berupa file <strong>PDF</strong>.</li>
                                <li>Semua berkas akan divalidasi oleh Badan Eksekutif Mahasiswa (BEM) Fakultas.</li>
                            </ul>
                        </div>

                        <div class="space-y-2">
                            <div class="font-bold text-stone-800 uppercase tracking-wider text-[10px]">Bobot Nilai SKP (Contoh):</div>
                            <table class="w-full text-left border-collapse mt-1">
                                <thead>
                                    <tr class="bg-stone-50 text-stone-500 font-bold border-b border-stone-100">
                                        <th class="py-1 px-2">Tingkat Kegiatan</th>
                                        <th class="py-1 px-2 text-right">Bobot</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-stone-50">
                                    <tr>
                                        <td class="py-1 px-2">Fakultas / Prodi</td>
                                        <td class="py-1 px-2 text-right">1 - 2 SKP</td>
                                    </tr>
                                    <tr>
                                        <td class="py-1 px-2">Universitas / Regional</td>
                                        <td class="py-1 px-2 text-right">2 - 3 SKP</td>
                                    </tr>
                                    <tr>
                                        <td class="py-1 px-2">Nasional</td>
                                        <td class="py-1 px-2 text-right">3 - 4 SKP</td>
                                    </tr>
                                    <tr>
                                        <td class="py-1 px-2">Internasional</td>
                                        <td class="py-1 px-2 text-right">5+ SKP</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
