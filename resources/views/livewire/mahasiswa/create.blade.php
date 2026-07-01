<div>
    {{-- Header Page --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white border-b border-stone-200">
        <div>
            <h1 class="text-2xl font-bold text-stone-900">{{ $isEdit ? 'Edit Sertifikat SKP' : 'Upload Sertifikat Baru' }}</h1>
            <p class="text-sm text-stone-500">Isi formulir berikut dengan data yang valid untuk mengajukan SKP Anda.</p>
        </div>
        <div>
            <a href="{{ route('mahasiswa.daftar') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-stone-100 hover:bg-stone-200 text-stone-700 text-sm font-semibold rounded-lg transition duration-200 shadow-sm">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </div>

    {{-- Main Container --}}
    <div class="py-8 pl-11 pr-7 bg-stone-50 min-h-screen">
        <div class="w-full max-w-4xl my-2 font-sans">
            
            {{-- Alert Success / Error --}}
            @if (session()->has('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm font-medium">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-6 md:p-8">
                <form wire:submit.prevent="saveCertificate" class="space-y-6">
                    
                    {{-- Nama Kegiatan --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="nama_kegiatan" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                            Nama Kegiatan
                        </label>
                        <input 
                            type="text" 
                            id="nama_kegiatan"
                            wire:model="nama_kegiatan"
                            placeholder="Seminar AI & Machine Learning 2026"
                            class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('nama_kegiatan') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                        />
                        <span class="text-stone-400 text-[11px]">Tuliskan nama lengkap kegiatan.</span>
                        @error('nama_kegiatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Kategori SKP --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="kategori_skp" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                            Kategori SKP
                        </label>
                        <select 
                            id="kategori_skp"
                            wire:model="kategori_skp"
                            class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('kategori_skp') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                        >
                            <option value="">Pilih Kategori SKP</option>
                            @foreach($subUnsurs as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->unsur->name }} &mdash; {{ $sub->name }}</option>
                            @endforeach
                        </select>
                        @error('kategori_skp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tempat & Semester --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-1.5">
                            <label for="tempat_kegiatan" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                                Tempat Kegiatan
                            </label>
                            <input 
                                type="text" 
                                id="tempat_kegiatan"
                                wire:model="tempat_kegiatan"
                                placeholder="Tempat Kegiatan (misal: Aula Udayana)"
                                class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('tempat_kegiatan') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                            />
                            @error('tempat_kegiatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="semester" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                                Semester Kegiatan
                            </label>
                            <select 
                                id="semester"
                                wire:model="semester"
                                class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('semester') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                            >
                                <option value="">Pilih Semester</option>
                                @foreach($semesters as $sem)
                                    <option value="{{ $sem->id }}">{{ $sem->name }}</option>
                                @endforeach
                            </select>
                            @error('semester') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Tanggal Mulai & Selesai --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-1.5">
                            <label for="tgl_mulai" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                                Tanggal Dimulai Kegiatan
                            </label>
                            <input 
                                type="date" 
                                id="tgl_mulai"
                                wire:model="tgl_mulai"
                                class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('tgl_mulai') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                            />
                            @error('tgl_mulai') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="tgl_selesai" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                                Tanggal Selesai Kegiatan
                            </label>
                            <input 
                                type="date" 
                                id="tgl_selesai"
                                wire:model="tgl_selesai"
                                class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('tgl_selesai') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                            />
                            @error('tgl_selesai') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Tingkat Kegiatan --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="tingkat_kegiatan" class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                            Tingkat Kegiatan
                        </label>
                        <select 
                            id="tingkat_kegiatan"
                            wire:model="tingkat_kegiatan"
                            class="w-full px-4 py-2.5 bg-white text-stone-900 text-sm rounded-lg border @error('tingkat_kegiatan') border-red-500 focus:ring-red-500 @else border-stone-300 focus:ring-teal-700 @enderror focus:outline-none focus:ring-2 transition duration-150"
                        >
                            <option value="">Pilih Tingkat Kegiatan</option>
                            @foreach($tingkats as $ting)
                                <option value="{{ $ting->id }}">{{ $ting->name }}</option>
                            @endforeach
                        </select>
                        @error('tingkat_kegiatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Lampiran Sertifikat --}}
                    <div class="flex flex-col gap-1.5">
                        <label class="text-stone-600 text-[11px] font-bold tracking-wide uppercase">
                            Lampiran Kegiatan (File PDF)
                        </label>
                        
                        {{-- Drag & Drop Area --}}
                        <div class="w-full px-6 py-8 bg-white rounded-2xl border-2 border-dashed @error('sertifikat') border-red-400 bg-red-50/50 @else border-stone-300 hover:bg-stone-50 @enderror flex flex-col items-center justify-center gap-2 transition cursor-pointer relative">
                            <input 
                                type="file" 
                                wire:model="sertifikat" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                accept="application/pdf"
                            />
                            <div class="text-3xl text-stone-700">📎</div>
                            <div class="text-stone-900 text-sm font-semibold">
                                {{ $sertifikat ? $sertifikat->getClientOriginalName() : 'Pilih File Sertifikat' }}
                            </div>
                            <div class="text-stone-400 text-xs text-center">Klik atau drag & drop file PDF (maks. 5MB)</div>
                            
                            <div wire:loading wire:target="sertifikat" class="text-teal-900 text-xs font-semibold mt-2 animate-pulse">
                                Mengunggah file...
                            </div>
                        </div>

                        {{-- Existing File Notice --}}
                        @if($isEdit && $existing_sertifikat)
                            <div class="mt-2 text-xs text-stone-500 flex items-center gap-1.5 bg-stone-100 px-3 py-2 rounded-lg">
                                <span>📄</span>
                                <span class="font-medium">Sertifikat saat ini:</span>
                                <a href="{{ asset('storage/' . $existing_sertifikat) }}" target="_blank" class="text-teal-700 hover:text-teal-900 font-semibold underline">
                                    Lihat File
                                </a>
                                <span class="text-[10px] text-stone-400">(Unggah file baru jika ingin mengganti)</span>
                            </div>
                        @endif

                        @error('sertifikat') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex justify-end pt-4">
                        <button 
                            type="submit" 
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-teal-900 text-white font-semibold rounded-md hover:bg-teal-950 transition duration-200 shadow-md focus:outline-none focus:ring-2 focus:ring-teal-700 focus:ring-offset-2"
                        >
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/>
                            </svg>
                            <span>{{ $isEdit ? 'Simpan Perubahan' : 'Upload Sertifikat' }}</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
