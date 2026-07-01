
<div class="flex flex-col h-full">

    {{-- Header --}}
    <div class="flex justify-between items-center px-8 pt-8 pb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Sertifikat</h1>
            <p class="text-sm text-gray-500">Mahasiswa Universitas Udayana</p>
        </div>
        <button class="relative">
            <x-icons.notifications class="h-5 w-5 text-gray-700" />
        </button>
    </div>

    {{-- Main Content --}}
    <div class="flex gap-6 px-8 pb-8 flex-1 min-h-0">

        {{-- Form Edit Sertifikat --}}
        <div class="flex-1 bg-white rounded-2xl p-8 shadow-sm overflow-y-auto">

            {{-- Nama Kegiatan --}}
            <div class="mb-5">
                <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                    Nama Kegiatan
                </label>
                <input
                    type="text"
                    value="Workshop Design UI/UX"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                />
                <p class="text-xs text-gray-400 mt-1">Tuliskan nama lengkap kegiatan.</p>
            </div>

            {{-- Kategori SKP --}}
            <div class="mb-5">
                <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                    Kategori SKP
                </label>
                <input
                    type="text"
                    value="Kegiatan Bidang Penalaran/Ilmiah – Seminar/Workshop/Pelatihan"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                />
            </div>

            {{-- Tempat Kegiatan --}}
            <div class="mb-5">
                <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                    Tempat Kegiatan
                </label>
                <input
                    type="text"
                    value="Gedung LB 1.1, Program Studi Informatika, FMIPA, Universitas Udayana"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                />
            </div>

            {{-- Tanggal Dimulai & Selesai --}}
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                        Tanggal Dimulai Kegiatan
                    </label>
                    <input
                        type="date"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                    />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                        Tanggal Selesai Kegiatan
                    </label>
                    <input
                        type="date"
                        class="w-full border border-green-500 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                    />
                </div>
            </div>

            {{-- Semester Kegiatan --}}
            <div class="mb-5">
                <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                    Semester Kegiatan
                </label>
                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent bg-white">
                    <option value="">Pilih opsi</option>
                    <option>Semester 1</option>
                    <option>Semester 2</option>
                    <option>Semester 3</option>
                    <option>Semester 4</option>
                    <option>Semester 5</option>
                    <option>Semester 6</option>
                    <option>Semester 7</option>
                    <option>Semester 8</option>
                </select>
            </div>

            {{-- Tingkat Kegiatan --}}
            <div class="mb-5">
                <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                    Tingkat Kegiatan
                </label>
                <input
                    type="text"
                    value="Nasional"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent"
                />
            </div>

            {{-- Lampiran --}}
            <div class="mb-8">
                <label class="block text-xs font-semibold text-gray-500 tracking-widest uppercase mb-2">
                    Lampiran Kegiatan
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-10 flex flex-col items-center justify-center text-center cursor-pointer hover:border-green-500 hover:bg-green-50 transition">
                    <svg class="w-8 h-8 text-gray-400 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L19 19M5.636 5.636L5 5M15.5 9.5l-7 7M9 9.5h.01"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6.5l-7 7m7-7H7m6.5 0v6.5"/>
                    </svg>
                    <p class="text-sm font-medium text-gray-600">Upload Sertifikat</p>
                    <p class="text-xs text-gray-400 mt-1">Klik atau drag & drop file PDF (maks. 5MB)</p>
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end">
                <button class="bg-[#0f3d2e] text-white text-sm px-6 py-3 rounded-xl flex items-center gap-2 hover:bg-[#0a2e21] transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 19V5m0 0l-5 5m5-5l5 5"/>
                    </svg>
                    Upload Sertifikat
                </button>
            </div>
        </div>

        {{-- Chat Admin --}}
        <div class="w-96 bg-[#f5f0eb] rounded-2xl flex flex-col shadow-sm overflow-hidden">

            {{-- Header Chat --}}
            <div class="px-6 py-5 border-b border-[#e5ded7]">
                <h2 class="text-lg font-semibold text-gray-700">Admin Ganteng</h2>
            </div>

            {{-- Isi Chat --}}
            <div class="flex-1 overflow-y-auto px-5 py-5 space-y-4">

                {{-- Bubble Admin (kiri) --}}
                <div class="flex justify-start">
                    <div class="bg-white text-sm text-gray-700 rounded-2xl rounded-tl-sm px-4 py-3 max-w-xs shadow-sm leading-relaxed">
                        Mohon perbaiki kategori sertifikat menjadi Kegiatan Bidang Penalaran/Ilmiah – Publikasi Ilmiah. Tempat pelaksanaan kegiatan juga belum diisi dengan lengkap dan benar
                    </div>
                </div>

                {{-- Bubble Mahasiswa (kanan) --}}
                <div class="flex justify-end">
                    <div class="bg-white text-sm text-gray-700 rounded-2xl rounded-tr-sm px-4 py-3 max-w-xs shadow-sm leading-relaxed text-right">
                        Tapi bukannya Workshop seharusnya masuk ke kategori Kegiatan Bidang Penalaran/Ilmiah – Seminar/Workshop/Pelatihan ya min?
                    </div>
                </div>

            </div>

            {{-- Input Chat --}}
            <div class="px-4 py-4 border-t border-[#e5ded7] bg-[#f5f0eb]">
                <div class="bg-white rounded-full px-4 py-2.5 flex items-center gap-3 shadow-sm">
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M8 13s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"/>
                        </svg>
                    </button>
                    <input
                        type="text"
                        placeholder=""
                        class="flex-1 text-sm text-gray-700 outline-none bg-transparent"
                    />
                    <div class="flex items-center gap-2 text-gray-400">
                        <button class="hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <path d="M21 15l-5-5L5 21"/>
                            </svg>
                        </button>
                        <button class="hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="border-t border-gray-200 px-8 py-4 flex justify-between items-center text-xs text-gray-400">
        <span>© 2026 SISAKTI+</span>
        <div class="flex gap-4">
            <a href="#" class="hover:text-gray-600">Panduan Pengguna</a>
            <a href="#" class="hover:text-gray-600">Kebijakan Layanan</a>
        </div>
    </div>

</div>
