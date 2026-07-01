@extends('layouts.user-layout')

@section('title', 'Panduan SKP')

@section('content')
<div>
    {{-- Header --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white">
        <div>
            <h1 class="text-2xl font-bold text-judul">Panduan SKP</h1>
            <p class="text-sm text-subtext-dark-grey">Mahasiswa Universitas Udayana</p>
        </div>

        <div class="flex items-center gap-4">
            {{-- Tombol Notifikasi --}}
            <button class="relative p-2 text-subtext-dark-grey hover:bg-subtext-light-grey/10 rounded-full transition">
                <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="25.2004" cy="5.73846" r="3.75066" fill="#FF383C" />
                    <path
                        d="M23.8593 14.6567C24.731 22.7206 28.1591 25.1586 28.1591 25.1586H1.1543C1.1543 25.1586 5.65509 21.9585 5.65509 10.756C5.65509 8.21005 6.60326 5.76761 8.29106 3.9673C9.97886 2.16698 12.2713 1.1543 14.6567 1.1543C15.1638 1.1543 15.6639 1.1993 16.157 1.28932M17.2521 29.6593C16.9884 30.114 16.6098 30.4915 16.1543 30.7538C15.6988 31.0162 15.1824 31.1543 14.6567 31.1543C14.131 31.1543 13.6146 31.0162 13.1591 30.7538C12.7036 30.4915 12.325 30.114 12.0612 29.6593M25.1586 10.1559C26.3522 10.1559 27.497 9.6817 28.3411 8.83764C29.1852 7.99358 29.6593 6.84878 29.6593 5.65509C29.6593 4.46141 29.1852 3.31661 28.3411 2.47255C27.497 1.62849 26.3522 1.1543 25.1586 1.1543C23.9649 1.1543 22.8201 1.62849 21.976 2.47255C21.1319 3.31661 20.6578 4.46141 20.6578 5.65509C20.6578 6.84878 21.1319 7.99358 21.976 8.83764C22.8201 9.6817 23.9649 10.1559 25.1586 10.1559Z"
                        stroke="black" stroke-width="2.3085" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Main Content Container --}}
    <div class="py-7 pl-11 pr-7 bg-[#E8E4DC] min-h-[calc(100vh-170px)]">
        <div class="bg-white rounded-[19px] p-8 shadow-sm ring-1 ring-slate-200/80 max-w-7xl">
            {{-- PDF Viewer --}}
            <iframe
                src="{{ asset('assets/file/panduan-skp-udayana2021.pdf') }}#toolbar=1&navpanes=0&scrollbar=1&view=FitH"
                class="w-full rounded-xl border border-slate-200"
                style="height: calc(100vh - 280px); min-height: 600px;"
                frameborder="0"
                allowfullscreen
            >
                <p class="text-sm text-slate-500 text-center py-8">
                    Browser Anda tidak mendukung tampilan PDF secara langsung.
                    <a href="{{ asset('assets/file/panduan-skp-udayana2021.pdf') }}" class="text-[#1B4D3E] underline font-semibold" target="_blank">
                        Klik di sini untuk membuka file PDF.
                    </a>
                </p>
            </iframe>
        </div>
    </div>

    {{-- Footer Dashboard --}}
    <div class="py-1 pl-18 pb-24 pt-8 flex justify-between items-center bg-[#E8E4DC]">
        <p class="text-sm text-slate-500">© 2026 SISAKTI+
            <button class="text-[#1B4D3E] hover:text-[#153a2d] pl-180">Kebijakan Privasi</button>
            <button class="text-[#1B4D3E] hover:text-[#153a2d] pl-10">Panduan Pengguna</button>
        </p>
    </div>
</div>
@endsection
