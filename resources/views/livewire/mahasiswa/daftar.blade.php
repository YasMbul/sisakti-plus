<div>
    {{-- Header Page --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white border-b border-stone-200">
        <div>
            <h1 class="text-2xl font-bold text-stone-900">Daftar Sertifikat</h1>
            <p class="text-sm text-stone-500">Kelola riwayat sertifikat SKP yang telah Anda unggah.</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- Tombol Download Kartu SKP --}}
            <a href="{{ route('mahasiswa.kartu-skp.download') }}"
            target="_blank"
            class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-teal-900 hover:bg-teal-50 text-teal-900 text-sm font-semibold rounded-lg transition duration-200">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
                </svg>
                Cetak Kartu SKP
            </a>

            <a href="{{ route('mahasiswa.upload') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-teal-900 hover:bg-teal-950 text-white text-sm font-semibold rounded-lg transition duration-200 shadow-md">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                Upload Baru
            </a>
        </div>
    </div>

    {{-- Main Container --}}
    <div class="py-2 pl-11 pr-7 bg-stone-50 min-h-[79vh]">
        <div class="w-full my-2 font-sans space-y-6">

            {{-- Flash Alert --}}
            @if (session()->has('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm font-medium">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Filter & Search Card --}}
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-4 md:p-6 flex flex-col md:flex-row gap-4 justify-between items-center">
                
                {{-- Search Input --}}
                <div class="relative w-full md:w-72">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-stone-400 pointer-events-none text-sm">
                        🔍
                    </span>
                    <input 
                        type="text" 
                        wire:model.live="search"
                        placeholder="Cari nama kegiatan..." 
                        class="w-full pl-9 pr-4 py-2 text-sm bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700 transition"
                    />
                </div>

                {{-- Select Filters --}}
                <div class="flex flex-wrap gap-4 w-full md:w-auto justify-end">
                    
                    {{-- Semester Filter --}}
                    <select 
                        wire:model.live="semesterFilter"
                        class="px-4 py-2 text-sm bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700 transition"
                    >
                        <option value="">Semua Semester</option>
                        @foreach($semesters as $sem)
                            <option value="{{ $sem->id }}">{{ $sem->name }}</option>
                        @endforeach
                    </select>

                    {{-- Status Filter --}}
                    <select 
                        wire:model.live="statusFilter"
                        class="px-4 py-2 text-sm bg-stone-50 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700 transition"
                    >
                        <option value="">Semua Status</option>
                        <option value="rejected">Ditolak</option>
                        <option value="pending">Menunggu</option>
                        <option value="approved">Disetujui</option>
                    </select>

                </div>
            </div>

            {{-- Table Card --}}
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-stone-50 border-b border-stone-200 text-stone-600 text-xs font-bold uppercase tracking-wider">
                                <th class="px-6 py-4">Nama Kegiatan</th>
                                <th class="px-6 py-4">Kategori SKP</th>
                                <th class="px-6 py-4">Tempat & Tanggal</th>
                                <th class="px-6 py-4 text-center">Bobot</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 text-stone-900">
                            @forelse($skps as $skp)
                                <tr class="hover:bg-stone-55/30 transition">
                                    {{-- Nama Kegiatan --}}
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-stone-950">{{ $skp->name }}</div>
                                        <div class="text-stone-400 text-xs mt-0.5">Semester: {{ $skp->semester->name ?? '-' }}</div>
                                    </td>
                                    
                                    {{-- Kategori SKP --}}
                                    <td class="px-6 py-4 max-w-xs">
                                        <span class="py-1 text-stone-700 rounded-md text-xs font-medium block truncate" title="{{ $skp->skpDetail->name ?? '-' }}">
                                            {{ $skp->skpDetail->subUnsur->name ?? '-' }}
                                        </span>
                                        <span class="text-[10px] text-stone-400 mt-1 block">Tingkat: {{ $skp->skpDetail->tingkat->name ?? '-' }}</span>
                                    </td>

                                    {{-- Tempat & Tanggal --}}
                                    <td class="px-6 py-4">
                                        <div class="text-stone-700">{{ $skp->location }}</div>
                                        <div class="text-stone-400 text-[11px] mt-0.5">
                                            {{ \Carbon\Carbon::parse($skp->start_date)->translatedFormat('d M Y') }} - 
                                            {{ \Carbon\Carbon::parse($skp->end_date)->translatedFormat('d M Y') }}
                                        </div>
                                    </td>

                                    {{-- Bobot --}}
                                    <td class="px-6 py-4 text-center font-bold text-teal-800">
                                        +{{ $skp->skpDetail->bobot ?? 0 }} SKP
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4 text-center">
                                        @if($skp->status === 'approved')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                🟢 Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                                🟡 Menunggu
                                            </span>
                                        @endif
                                        
                                        @if($skp->note)
                                            <div class="text-[10px] text-red-500 font-medium mt-1" title="{{ $skp->note }}">
                                                Catatan: {{ Str::limit($skp->note, 20) }}
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            
                                            {{-- View File --}}
                                            <a 
                                                href="{{ asset('storage/' . $skp->sertificate) }}" 
                                                target="_blank" 
                                                class="p-1.5 text-stone-500 hover:text-stone-850 hover:bg-stone-100 rounded-lg transition"
                                                title="Lihat Sertifikat"
                                            >
                                                📄
                                            </a>

                                            @if($skp->status !== 'approved')
                                                {{-- Edit --}}
                                                <a 
                                                    href="{{ route('mahasiswa.upload', $skp->id) }}" 
                                                    class="p-1.5 text-teal-700 hover:text-teal-900 hover:bg-teal-50 rounded-lg transition"
                                                    title="Edit Data"
                                                >
                                                    ✏️
                                                </a>

                                                {{-- Delete --}}
                                                <button 
                                                    wire:click="delete({{ $skp->id }})" 
                                                    wire:confirm="Apakah Anda yakin ingin menghapus sertifikat ini?"
                                                    class="p-1.5 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition"
                                                    title="Hapus Data"
                                                >
                                                    🗑️
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="text-4xl">📭</div>
                                        <div class="text-stone-800 font-semibold mt-3 text-base">Belum Ada Sertifikat</div>
                                        <div class="text-stone-400 text-xs mt-1">Sertifikat yang Anda unggah akan terdaftar di sini.</div>
                                        <div class="mt-4">
                                            <a href="{{ route('mahasiswa.upload') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-teal-900 hover:bg-teal-950 text-white text-xs font-semibold rounded-lg transition duration-200">
                                                Mulai Upload
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- Footer Dashboard --}}
<x-footer/>
</div>
