<div>
    {{-- Header Verifikasi SKP --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white">
        <div>
            <h1 class="text-2xl font-bold text-judul">Verifikasi SKP</h1>
            <p class="text-sm text-subtext-dark-grey">Mahasiswa Universitas Udayana</p>
        </div>
        
        <div class="flex items-center gap-4">
            {{-- Tombol Notifikasi --}}
            <button class="relative p-2 text-subtext-dark-grey hover:bg-subtext-light-grey/10 rounded-full transition">
                <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="25.2004" cy="5.73846" r="3.75066" fill="#FF383C"/>
                    <path d="M23.8593 14.6567C24.731 22.7206 28.1591 25.1586 28.1591 25.1586H1.1543C1.1543 25.1586 5.65509 21.9585 5.65509 10.756C5.65509 8.21005 6.60326 5.76761 8.29106 3.9673C9.97886 2.16698 12.2713 1.1543 14.6567 1.1543C15.1638 1.1543 15.6639 1.1993 16.157 1.28932M17.2521 29.6593C16.9884 30.114 16.6098 30.4915 16.1543 30.7538C15.6988 31.0162 15.1824 31.1543 14.6567 31.1543C14.131 31.1543 13.6146 31.0162 13.1591 30.7538C12.7036 30.4915 12.325 30.114 12.0612 29.6593M25.1586 10.1559C26.3522 10.1559 27.497 9.6817 28.3411 8.83764C29.1852 7.99358 29.6593 6.84878 29.6593 5.65509C29.6593 4.46141 29.1852 3.31661 28.3411 2.47255C27.497 1.62849 26.3522 1.1543 25.1586 1.1543C23.9649 1.1543 22.8201 1.62849 21.976 2.47255C21.1319 3.31661 20.6578 4.46141 20.6578 5.65509C20.6578 6.84878 21.1319 7.99358 21.976 8.83764C22.8201 9.6817 23.9649 10.1559 25.1586 10.1559Z" stroke="black" stroke-width="2.3085" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            {{-- Tombol Export Data --}}
            <button class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition shadow-sm text-sm cursor-pointer">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.6963 1.24463V16.9651M14.7705 8.31885L7.6963 1.24463L0.62207 8.31885" stroke="white" stroke-width="1.76"/>
                </svg>
                Export Data
            </button>
        </div>
    </div>

    {{-- Main Content Area --}}
    <div class="py-7 pl-11 pr-7 bg-background min-h-screen">
        
        {{-- Card Container Utama --}}
        <div class="bg-white rounded-2xl border border-border-custom p-6 shadow-sm">
            
            {{-- Judul Tabel/Sektor --}}
            <div class="mb-6">
                <h3 class="text-base font-bold text-black">Antrian Validasi Terbaru</h3>
            </div>

            {{-- List Items Antrian Validasi --}}
            <div class="space-y-3">
                
                {{-- Data --}}
                @for ($i = 0; $i < 4; $i++)
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
                                5 Sertifikat Belum Diverifikasi
                            </p>
                        </div>
                    </div>
                    <div>
                        <button class="px-4 py-1.5 text-xs font-semibold bg-status-green/10 text-primary rounded-lg hover:bg-status-green/20 transition cursor-pointer">
                            Periksa
                        </button>
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