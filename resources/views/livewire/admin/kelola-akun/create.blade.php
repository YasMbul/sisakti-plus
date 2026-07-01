<div>
    {{-- Header Top Bar --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white">
        <div>
            <h1 class="text-2xl font-bold text-judul">Tambah Akun</h1>
            <p class="text-sm text-subtext-dark-grey">Mahasiswa Universitas Udayana</p>
        </div>
        
        {{-- Tombol Notifikasi --}}
        {{-- <div class="flex items-center gap-4">
            <button class="relative p-2 text-subtext-dark-grey hover:bg-subtext-light-grey/10 rounded-full transition">
                <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="25.2004" cy="5.73846" r="3.75066" fill="#FF383C"/>
                    <path d="M23.8593 14.6567C24.731 22.7206 28.1591 25.1586 28.1591 25.1586H1.1543C1.1543 25.1586 5.65509 21.9585 5.65509 10.756C5.65509 8.21005 6.60326 5.76761 8.29106 3.9673C9.97886 2.16698 12.2713 1.1543 14.6567 1.1543C15.1638 1.1543 15.6639 1.1993 16.157 1.28932M17.2521 29.6593C16.9884 30.114 16.6098 30.4915 16.1543 30.7538C15.6988 31.0162 15.1824 31.1543 14.6567 31.1543C14.131 31.1543 13.6146 31.0162 13.1591 30.7538C12.7036 30.4915 12.325 30.114 12.0612 29.6593M25.1586 10.1559C26.3522 10.1559 27.497 9.6817 28.3411 8.83764C29.1852 7.99358 29.6593 6.84878 29.6593 5.65509C29.6593 4.46141 29.1852 3.31661 28.3411 2.47255C27.497 1.62849 26.3522 1.1543 25.1586 1.1543C23.9649 1.1543 22.8201 1.62849 21.976 2.47255C21.1319 3.31661 20.6578 4.46141 20.6578 5.65509C20.6578 6.84878 21.1319 7.99358 21.976 8.83764C22.8201 9.6817 23.9649 10.1559 25.1586 10.1559Z" stroke="black" stroke-width="2.3085" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div> --}}
    </div>

    {{-- Main Container --}}
    <div class="py-9 pl-11 pr-7 bg-background min-h-screen ">
        
        {{-- Card Form Utama --}}
        <div class="max-w-4xl mx-auto bg-white rounded-2xl border border-border-custom shadow-sm overflow-hidden">
            
            {{-- Banner Hijau Atas Card --}}
            <div class="bg-primary px-8 py-6 text-white">
                <h2 class="text-xl font-bold">Tambah Akun Mahasiswa</h2>
                <p class="text-xs text-white mt-1">Lengkapi formulir di bawah ini untuk membuat akun untuk mahasiswa.</p>
            </div>

            {{-- Body Form --}}
            <form wire:submit.prevent="store" class="p-8 space-y-6">
                
                {{-- 1. Input Nama Mahasiswa --}}
                <div class="flex flex-col gap-1 transition duration-300">
                    <x-input 
                        label="NAMA MAHASISWA" 
                        name="nama"
                        placeholder="Tulis Nama Induk Mahasiswa"  
                    />
                    @error('name') <span class="text-sm text-status-red mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Grid NIM & Prodi Menggunakan x-input --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- 2. Input NIM --}}
                    <x-input 
                        label="NOMOR INDUK MAHASISWA (NIM)" 
                        name="nim" 
                        placeholder="Tulis Nomer Induk Mahasiswa" 
                    />

                    {{-- 3. Input Program Studi (Dropdown) --}}
                    <div class="flex flex-col gap-1 transition duration-300">
                        <x-input 
                        label="PROGRAM STUDI" 
                        name="prodi"
                        placeholder="Tulis Program Studi Mahasiswa"  
                    />
                        @error('prodi') <span class="text-sm text-status-red mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- 4. Input Tujuan Peminjaman Menggunakan x-input type="text area" --}}
                <x-input 
                    label="TUJUAN PEMINJAMAN" 
                    name="tujuan" 
                    type="text area" 
                    rows="4"
                    placeholder="Jelaskan keperluan peminjaman barang secara detail..." 
                />

                {{-- 5. Upload File Zone --}}
                <div class="flex flex-col gap-1 transition duration-300">
                    <label class="font-semibold block text-sm text-gray-700">UPLOAD BUKTI PERSETUJUAN / KTM</label>
                    
                    {{-- Box Dropzone --}}
                    <div class="relative w-full py-9 border-2 border-dashed border-gray-300 rounded-[10px] bg-[#F8FAFC] hover:bg-[#F1F5F9] transition flex flex-col items-center justify-center group cursor-pointer">
                        <input type="file" wire:model="bukti_file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        
                        {{-- Icon Cloud Bundar --}}
                        <div class="w-14 h-14 bg-[#E2E8F0] group-hover:bg-[#CBD5E1] rounded-full flex items-center justify-center transition mb-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-primary">
                                <path d="M12 16V8M12 8L9 11M12 8L15 11M20 16.58C21.22 15.54 22 14 22 12.28C22 9.28 19.78 6.8 17 6.33C16.5 4.4 14.7 3 12.5 3C9.8 3 7.5 5 7.07 7.56C4.19 7.84 2 10.3 2 13.28C2 16.44 4.56 19 7.72 19H16.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        
                        {{-- Text Status Unggah --}}
                        <p class="text-sm font-semibold text-gray-600">
                            <span class="text-primary hover:underline">Klik untuk unggah</span> atau seret file ke sini
                        </p>
                        <p class="text-xs text-gray-400 mt-1">Format PDF, JPG, atau PNG (Maks. 5MB)</p>

                        {{-- Indikator File Berhasil Dipilih (Livewire Property Check) --}}
                        {{-- @if ($bukti_file)
                            <div class="absolute inset-0 bg-white/95 rounded-[10px] flex items-center justify-center p-4">
                                <span class="text-xs font-bold text-[#0D533A] bg-[#0D533A]/10 px-3 py-1.5 rounded-lg flex items-center gap-1.5">
                                    ✓ File Terpilih: {{ $bukti_file->getClientOriginalName() }}
                                </span>
                            </div>
                        @endif --}}
                    </div>
                    @error('bukti_file') <span class="text-sm text-status-red mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Aksi Tombol (Batal & Submit) --}}
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="/admin/kelola-akun" class="px-6 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition cursor-pointer">
                        Batal
                    </a>
                    <button type="submit" class="flex items-center gap-2 px-6 py-2.5 text-sm font-bold text-white bg-[#0D533A] hover:bg-opacity-90 rounded-xl transition shadow-sm cursor-pointer">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 13.5L14 8L2.5 2.5V6.83333L10.6667 8L2.5 9.16667V13.5Z" fill="white" stroke="white" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>