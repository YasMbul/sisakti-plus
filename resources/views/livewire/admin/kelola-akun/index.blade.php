<div>
    <x-header-dashboard 
      title="Kelola Akun"  
   />

    {{-- Main Content Area --}}
    <div class="py-7 pl-11 pr-7 bg-background min-h-screen">
        
        {{-- Card Container Utama --}}
        <div class="bg-white rounded-2xl border border-border-custom p-6 shadow-sm">
            
            {{-- Bagian Atas Card: Judul Sektor & Tombol Tambah --}}
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-base font-bold text-black">Akun Mahasiswa</h3>
                
                {{-- Tombol Tambah Akun --}}
                <a href="/admin/kelola-akun/create" class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition shadow-sm text-xs cursor-pointer">
                    <span>Tambah Akun</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </a>
            </div>

            {{-- Sub-Tab Bar (Menandakan Halaman Aktif / Filter "Mahasiswa") --}}
            <div class="w-full bg-border-custom/10 border border-border-custom rounded-xl p-3 mb-4">
                <span class="text-sm font-bold text-primary px-4 cursor-pointer">
                    Mahasiswa
                </span>
            </div>

            {{-- List Items Data Akun --}}
            <div class="space-y-3">
                
                {{-- Isi Data Mahasiswa --}}
                @for ($i = 0; $i < 6; $i++)
                <div class="flex items-center justify-between p-4 border border-border-custom rounded-xl hover:bg-border-custom/10 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-status-green/10 flex items-center justify-center text-primary font-bold text-sm tracking-wide">
                            IO
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-black">
                                I Nyoman Oka
                            </h4>
                            <p class="text-xs text-subtext-dark-grey mt-0.5">
                                2408551009
                            </p>
                        </div>
                    </div>
                </div>
                @endfor

            </div>

            {{-- Bagian Pagination Terbawah --}}
            <div class="flex justify-between items-center mt-6 pt-2">
                {{-- Tombol Previous --}}
                <button class="px-4 py-2 border border-border-custom rounded-xl text-xs font-bold text-black hover:bg-border-custom/10 transition cursor-pointer">
                    Previous
                </button>
                
                {{-- Keterangan Halaman --}}
                <span class="text-xs font-semibold text-primary">
                    Page 1 of 7
                </span>

                {{-- Tombol Next --}}
                <button class="px-4 py-2 border border-border-custom rounded-xl text-xs font-bold text-black hover:bg-border-custom/10 transition cursor-pointer">
                    Next
                </button>
            </div>

        </div>
    </div>
</div>