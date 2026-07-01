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
            {{-- <button class="flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-opacity-90 transition shadow-sm text-sm cursor-pointer">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.6963 1.24463V16.9651M14.7705 8.31885L7.6963 1.24463L0.62207 8.31885" stroke="white" stroke-width="1.76"/>
                </svg>
                Export Data
            </button> --}}
        </div>
    </div>

    {{-- Main Content Area --}}
    <div class="py-7 pl-11 pr-7 bg-background min-h-screen">
        
        {{-- Card Container Utama --}}
        <div class="bg-white rounded-2xl border border-border-custom p-6 shadow-sm">
            
            {{-- Tombol Kembali & Nama Mahasiswa --}}
            <div class="flex items-center gap-3 mb-8">
                <a href='/admin/verifikasi-skp' class="text-black hover:text-primary transition">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                </a>
                <h3 class="text-base font-bold text-black">
                    Wayan Agus Saputra – 2408561098
                </h3>
            </div>

            {{-- Tabel Sertifikat --}}
            <div class="overflow-x-auto flex flex-1">
                <table class="w-full text-left border-collapse">
                    <tbody>
                        {{-- Data Dummy Array untuk disimulasikan (Nanti temanmu tinggal mengganti bagian ini dengan data asli database) --}}
                        @php
                            $sertifikats = [
                                ['nama' => 'Panitia Dies Natalis 2024', 'kategori' => 'Kepanitiaan', 'tanggal' => 'Feb 2024', 'skp' => '5', 'status' => 'pending'],
                                ['nama' => 'Workshop Desain UI/UX', 'kategori' => 'Seminar', 'tanggal' => 'Apr 2024', 'skp' => '—', 'status' => 'ditolak'],
                                ['nama' => 'PKKMB Universitas Udayana', 'kategori' => 'Wajib', 'tanggal' => 'Agt 2022', 'skp' => '+10', 'status' => 'disetujui'],
                            ];
                        @endphp

                        @foreach ($sertifikats as $item)
                        <tr class="border-b border-border-custom/50 last:border-none hover:bg-border-custom/5 transition">
                            {{-- Nama Sertifikat/Kegiatan --}}
                            <td class="py-5 pr-4 text-sm font-bold text-black w-1/3">
                                {{ $item['nama'] }}
                            </td>

                            {{-- Kategori (Kepanitiaan, Seminar, Wajib) --}}
                            <td class="py-5 px-4 text-xs">
                                <span class="px-3 py-1 bg-border-custom/20 text-subtext-dark-grey rounded-full font-medium">
                                    {{ $item['kategori'] }}
                                </span>
                            </td>

                            {{-- Tanggal Kegiatan --}}
                            <td class="py-5 px-4 text-xs text-subtext-dark-grey font-medium">
                                {{ $item['tanggal'] }}
                            </td>

                            {{-- Jumlah SKP atau atur dah biar ada if else biar dia kalo ditolak jadi -, kalo disetujui ada tanda plusnya --}}
                            <td class="py-5 px-4 text-xs font-bold {{ $item['skp'] !== '—' ? 'text-status-green' : 'text-subtext-dark-grey' }}">
                                {{ $item['skp'] }}
                            </td>

                            {{-- LOGIC KONDISIONAL BADGE STATUS --}}
                            <td class="py-5 px-4 text-xs font-bold">
                                @if($item['status'] == 'pending')
                                    <span class="px-3 py-1 bg-status-yellow/10 text-status-yellow/80 rounded-full">Pending</span>
                                @elseif($item['status'] == 'ditolak')
                                    <span class="px-3 py-1 bg-red-50 text-status-red/80 rounded-full">Ditolak</span>
                                @elseif($item['status'] == 'disetujui')
                                    <span class="px-3 py-1 bg-status-green/10 text-status-green rounded-full">Disetujui</span>
                                @endif
                            </td>

                            {{-- LOGIC KONDISIONAL ACTION BUTTONS (Setujui / Tolak) --}}
                            <td class="py-5 px-4">
                                <div class="flex gap-2">
                                    @if($item['status'] == 'pending')
                                        <button class="px-3 py-1.5 text-xs font-semibold bg-status-green/10 text-primary rounded-md hover:bg-status-green/20 transition cursor-pointer">
                                            Setujui
                                        </button>
                                        <button wire:click="tolakSkp(1)" class="px-3 py-1.5 text-xs font-semibold bg-red-50 text-status-red rounded-md hover:bg-red-100 transition cursor-pointer">
                                            Tolak
                                        </button>
                                    @else
                                        {{-- Jika sudah Disetujui atau Ditolak, tombol dibuat disabled / samar sesuai desain --}}
                                        <button disabled class="px-3 py-1.5 text-xs font-semibold bg-status-green/10 text-primary/70 rounded-md opacity-50 cursor-not-allowed">
                                            Setujui
                                        </button>
                                        <button disabled class="px-3 py-1.5 text-xs font-semibold bg-red-50 text-status-red/70 rounded-md opacity-50 cursor-not-allowed">
                                            Tolak
                                        </button>
                                    @endif
                                </div>
                            </td>

                            {{-- Tombol Lihat Detail Berkas --}}
                            <td class="py-5 pl-4 text-right">
                                <button class="inline-flex items-center gap-1.5 bg-primary text-white px-3 py-1.5 rounded-lg font-semibold hover:bg-opacity-90 transition text-xs cursor-pointer">
                                    <span>Lihat Detail</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4549 5.41583C21.5499 5.56004 21.5922 5.73261 21.5747 5.90442C21.5573 6.07622 21.481 6.23673 21.3589 6.35883L12.1659 15.5508C12.0718 15.6448 11.9545 15.7121 11.8259 15.7458L7.99689 16.7458C7.87032 16.7788 7.73732 16.7782 7.61109 16.7439C7.48485 16.7096 7.36978 16.6429 7.27729 16.5504C7.18479 16.4579 7.1181 16.3429 7.08382 16.2166C7.04955 16.0904 7.04888 15.9574 7.08189 15.8308L8.08189 12.0028C8.1118 11.8882 8.16679 11.7816 8.24289 11.6908L17.4699 2.46983C17.6105 2.32938 17.8011 2.25049 17.9999 2.25049C18.1986 2.25049 18.3893 2.32938 18.5299 2.46983L21.3589 5.29783C21.3938 5.33467 21.4259 5.37411 21.4549 5.41583ZM19.7679 5.82783L17.9999 4.06083L9.48189 12.5788L8.85689 14.9718L11.2499 14.3468L19.7679 5.82783Z" fill="white"/>
                                        <path d="M19.641 17.1601C19.9143 14.824 20.0016 12.47 19.902 10.1201C19.8997 10.0647 19.9088 10.0094 19.929 9.95778C19.9491 9.90614 19.9798 9.85925 20.019 9.82008L21.003 8.83608C21.0299 8.80904 21.064 8.79033 21.1013 8.78222C21.1385 8.77411 21.1774 8.77693 21.2131 8.79034C21.2488 8.80375 21.2798 8.82719 21.3025 8.85783C21.3252 8.88847 21.3386 8.92502 21.341 8.96308C21.5257 11.7543 21.4554 14.5566 21.131 17.3351C20.895 19.3571 19.271 20.9421 17.258 21.1671C13.7633 21.5538 10.2367 21.5538 6.74201 21.1671C4.73001 20.9421 3.10501 19.3571 2.86901 17.3351C2.45512 13.7905 2.45512 10.2097 2.86901 6.66508C3.10501 4.64308 4.72901 3.05808 6.74201 2.83308C9.39446 2.54012 12.0667 2.46888 14.731 2.62008C14.7691 2.62281 14.8057 2.63642 14.8363 2.65929C14.867 2.68215 14.8904 2.71332 14.9039 2.7491C14.9173 2.78487 14.9203 2.82376 14.9123 2.86115C14.9044 2.89854 14.8859 2.93287 14.859 2.96008L13.866 3.95208C13.8272 3.99092 13.7808 4.02136 13.7297 4.04149C13.6786 4.06162 13.6239 4.07101 13.569 4.06908C11.3458 3.99293 9.11993 4.07815 6.90901 4.32408C6.26295 4.39558 5.65986 4.6828 5.19717 5.13933C4.73447 5.59586 4.43919 6.19504 4.35901 6.84008C3.95787 10.2684 3.95787 13.7318 4.35901 17.1601C4.43919 17.8051 4.73447 18.4043 5.19717 18.8608C5.65986 19.3174 6.26295 19.6046 6.90901 19.6761C10.264 20.0511 13.736 20.0511 17.092 19.6761C17.7381 19.6046 18.3412 19.3174 18.8039 18.8608C19.2666 18.4043 19.5608 17.8051 19.641 17.1601Z" fill="white"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Bagian Pagination Terbawah --}}
            <div class="flex justify-between items-center mt-8 pt-4 border-t border-border-custom/30">
                {{-- Tombol Previous --}}
                <button class="px-4 py-2 border border-border-custom rounded-xl text-xs font-bold text-black hover:bg-border-custom/10 transition cursor-pointer">
                    Previous
                </button>
                
                {{-- Keterangan Halaman --}}
                <span class="text-xs font-semibold text-subtext-dark-grey">
                    Page 1 of 7
                </span>

                {{-- Tombol Next --}}
                <button class="px-4 py-2 border border-border-custom rounded-xl text-xs font-bold text-black hover:bg-border-custom/10 transition cursor-pointer">
                    Next
                </button>
            </div>

        </div>
    </div>

    {{-- POP-UP KONFIRMASI HAPUS (ALPINJS + LIVEWIRE) --}}
{{-- <div 
    x-data="{ showModal: @shadow('confirmingDeletion') }" 
    x-show="showModal" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm font-['Instrument_Sans']"
    style="display: none;"
>
    
    <div @click.away="$wire.set('confirmingDeletion', false)" class="bg-white rounded-2xl border border-border-custom max-w-md w-full p-6 shadow-xl relative animate-fade-in-down">
        
        <button wire:click="$set('confirmingDeletion', false)" class="absolute top-4 right-4 text-subtext-light-grey hover:text-black transition cursor-pointer">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="flex flex-col items-center text-center mt-2">
            <div class="w-16 h-16 bg-status-red/10 rounded-full flex items-center justify-center text-status-red mb-4">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            </div>

            <h3 class="text-xl font-bold text-black mb-2">Hapus Akun Mahasiswa</h3>
            <p class="text-sm text-subtext-dark-grey leading-relaxed px-2">
                Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan hilang.
            </p>
        </div>

        <div class="flex gap-3 mt-6">
            <button 
                wire:click="$set('confirmingDeletion', false)" 
                class="w-full py-2.5 text-sm font-bold text-subtext-dark-grey bg-white border border-border-custom rounded-xl hover:bg-border-custom/20 transition cursor-pointer"
            >
                Batal
            </button>

            <button 
                wire:click="destroy" 
                class="w-full py-2.5 text-sm font-bold text-white bg-status-red hover:bg-opacity-95 rounded-xl transition shadow-sm cursor-pointer flex items-center justify-center gap-2"
            >
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
                Hapus Akun
            </button>
        </div>

    </div>
</div> --}}
</div>