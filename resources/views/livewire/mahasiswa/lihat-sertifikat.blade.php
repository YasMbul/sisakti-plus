@extends('layouts.user-layout')

@section('title', 'Lihat Sertifikat')

@section('content')
    <div>
        {{-- Header --}}
        <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white">
            <div>
                <h1 class="text-2xl font-bold text-judul">Lihat Sertifikat</h1>
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
                <form action="#" method="POST" class="flex flex-col gap-8">
                    @csrf

                    {{-- Form Response Columns Container --}}
                    <div class="flex flex-col md:flex-row gap-8 w-full">
                        {{-- Left Column --}}
                        <div class="w-full md:w-1/2 flex flex-col gap-6">
                            <div>
                                <label for="nama_kegiatan"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">NAMA
                                    KEGIATAN</label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                    value="OPTIMUS 2024" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                            <div>
                                <label for="tempat_kegiatan"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">TEMPAT
                                    KEGIATAN</label>
                                <input type="text" id="tempat_kegiatan" name="tempat_kegiatan"
                                    value="Gedung BG 1.1 & 1.2 Program Studi Informatika, Udayana" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                            <div>
                                <label for="tanggal_mulai"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">TANGGAL
                                    DIMULAI KEGIATAN</label>
                                <input type="text" id="tanggal_mulai" name="tanggal_mulai"
                                    value="06/10/24" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                            <div>
                                <label for="tingkat_kegiatan"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">TINGKAT
                                    KEGIATAN</label>
                                <input type="text" id="tingkat_kegiatan" name="tingkat_kegiatan"
                                    value="Program Studi" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                        </div>

                        {{-- Right Column --}}
                        <div class="w-full md:w-1/2 flex flex-col gap-6">
                            <div>
                                <label for="kategori_skp"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">KATEGORI
                                    SKP</label>
                                <input type="text" id="kategori_skp" name="kategori_skp"
                                    value="Kegiatan Bidang Penalaran/Ilmiah - Seminar/Workshop/Pelatihan" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                            <div>
                                <label for="semester_kegiatan"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">SEMESTER
                                    KEGIATAN</label>
                                <input type="text" id="semester_kegiatan" name="semester_kegiatan"
                                    value="Semester I" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                            <div>
                                <label for="tanggal_selesai"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">TANGGAL
                                    SELESAI KEGIATAN</label>
                                <input type="text" id="tanggal_selesai" name="tanggal_selesai"
                                    value="27/10/24" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                            <div>
                                <label for="partisipasi"
                                    class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">PARTISIPASI</label>
                                <input type="text" id="partisipasi" name="partisipasi"
                                    value="Peserta" readonly
                                    class="w-full h-[50px] px-4 py-0 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1B4D3E] focus:border-transparent text-sm text-slate-800 bg-white">
                            </div>
                        </div>
                    </div>

                    {{-- Lampiran Kegiatan --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">LAMPIRAN
                            KEGIATAN</label>
                        <div class="rounded-xl overflow-hidden border border-slate-300 shadow-sm bg-slate-50">
                            <img src="{{ asset('assets/images/Sertifikat OPTIMUS.png') }}" alt="Sertifikat OPTIMUS" class="w-full h-auto object-contain">
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="flex justify-end pt-4 gap-3">
                        <button type="submit"
                            class="flex items-center gap-2 bg-[#1B4D3E] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#153a2d] transition shadow-sm text-sm cursor-pointer">
                            <x-icons.back-arrow-kembali />
                            Kembali
                        </button>
                        <button type="submit"
                            class="flex items-center gap-2 bg-[#1B4D3E] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#153a2d] transition shadow-sm text-sm cursor-pointer">
                            <x-icons.trash-can />
                            Hapus Sertifikat
                        </button>
                    </div>
                </form>
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