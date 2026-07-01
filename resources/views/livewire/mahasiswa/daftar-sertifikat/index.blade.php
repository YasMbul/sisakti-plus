
<div class="p-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Sertifikat</h1>
            <p class="text-sm text-gray-500">Mahasiswa Universitas Udayana</p>
        </div>
        <button class="relative">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0"/>
            </svg>
            <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
        </button>
    </div>

    {{-- Cards Kategori --}}
    <div class="grid grid-cols-4 gap-4 mb-8">

        {{-- Disetujui / Syarat Terpenuhi --}}
        <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
            <p class="text-sm font-medium text-gray-800 mb-2">PKKMB Universitas Udayana</p>
            <span class="text-xs font-semibold text-green-600">Syarat Terpenuhi →</span>
        </div>

        {{-- Pending 1 --}}
        <div class="bg-white rounded-xl p-4 border border-yellow-300 shadow-sm">
            <p class="text-sm font-medium text-gray-800 mb-2">Program Kreativitas Mahasiswa (Ketua)</p>
            <span class="text-xs font-semibold text-yellow-500">Pending</span>
        </div>

        {{-- Belum Terpenuhi 1 --}}
        <div class="bg-white rounded-xl p-4 border border-red-300 shadow-sm">
            <p class="text-sm font-medium text-gray-800 mb-2">Praktek Kerja Lapangan</p>
            <span class="text-xs font-semibold text-red-500">Belum Terpenuhi</span>
        </div>

        {{-- Belum Terpenuhi 2 --}}
        <div class="bg-white rounded-xl p-4 border border-red-300 shadow-sm">
            <p class="text-sm font-medium text-gray-800 mb-2">Seminar Nasional Teknologi Informasi dan Aplikasinya (Peserta)</p>
            <span class="text-xs font-semibold text-red-500">Belum Terpenuhi</span>
        </div>

        {{-- Pending 2 --}}
        <div class="bg-white rounded-xl p-4 border border-yellow-300 shadow-sm col-start-2">
            <p class="text-sm font-medium text-gray-800 mb-2">Program Kreativitas Mahasiswa (Anggota)</p>
            <span class="text-xs font-semibold text-yellow-500">Pending</span>
        </div>

        {{-- Belum Terpenuhi 3 --}}
        <div class="bg-white rounded-xl p-4 border border-red-300 shadow-sm">
            <p class="text-sm font-medium text-gray-800 mb-2">Seminar Nasional Teknologi Informasi dan Aplikasinya (Pemakalah)</p>
            <span class="text-xs font-semibold text-red-500">Belum Terpenuhi</span>
        </div>

    </div>

    {{-- Tabel Sertifikat --}}
    <div class="bg-white rounded-xl shadow-sm p-6">

        {{-- Tab Filter + Tombol Cetak --}}
        <div class="flex justify-between items-center mb-6">
            <div class="flex gap-6 border-b border-gray-200 w-full">
                <button class="pb-3 text-sm font-semibold text-green-700 border-b-2 border-green-700">
                    Semua (17)
                </button>
                <button class="pb-3 text-sm text-gray-500 hover:text-gray-700">
                    Disetujui (14)
                </button>
                <button class="pb-3 text-sm text-gray-500 hover:text-gray-700">
                    Pending (3)
                </button>
                <button class="pb-3 text-sm text-gray-500 hover:text-gray-700">
                    Ditolak (2)
                </button>
            </div>
            <button class="ml-6 shrink-0 flex items-center gap-2 bg-[#0f3d2e] text-white text-sm px-4 py-2.5 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 17H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z"/>
                    <path d="M9 21h6M12 17v4"/>
                </svg>
                Cetak SKP
            </button>
        </div>

        {{-- Tabel --}}
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-xs text-gray-400 uppercase tracking-wider">
                    <th class="pb-3 font-medium w-1/3">Nama Kegiatan</th>
                    <th class="pb-3 font-medium">Kategori</th>
                    <th class="pb-3 font-medium">Tanggal</th>
                    <th class="pb-3 font-medium">Poin</th>
                    <th class="pb-3 font-medium">Status</th>
                    <th class="pb-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

                {{-- Baris 1 --}}
                <tr class="text-gray-700">
                    <td class="py-4 font-medium">PKKMB Universitas Udayana</td>
                    <td class="py-4">
                        <span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full">Wajib</span>
                    </td>
                    <td class="py-4 text-gray-500">Agt 2022</td>
                    <td class="py-4 font-medium">+1</td>
                    <td class="py-4">
                        <span class="bg-green-100 text-green-700 text-xs px-2.5 py-1 rounded-full">Disetujui</span>
                    </td>
                    <td class="py-4">
                        <button class="border border-gray-300 text-gray-600 text-xs px-3 py-1.5 rounded-lg hover:bg-gray-50">
                            Lihat
                        </button>
                    </td>
                </tr>

                {{-- Baris 2 --}}
                <tr class="text-gray-700">
                    <td class="py-4 font-medium">Panitia Dies Natalis 2024</td>
                    <td class="py-4">
                        <span class="bg-blue-100 text-blue-700 text-xs px-2.5 py-1 rounded-full">Kepanitiaan</span>
                    </td>
                    <td class="py-4 text-gray-500">Feb 2024</td>
                    <td class="py-4 text-gray-500">5</td>
                    <td class="py-4">
                        <span class="bg-yellow-100 text-yellow-700 text-xs px-2.5 py-1 rounded-full">Pending</span>
                    </td>
                    <td class="py-4">
                        <button class="border border-gray-300 text-gray-600 text-xs px-3 py-1.5 rounded-lg hover:bg-gray-50">
                            Lihat
                        </button>
                    </td>
                </tr>

                {{-- Baris 3 --}}
                <tr class="text-gray-700">
                    <td class="py-4 font-medium">Workshop Desain UI/UX</td>
                    <td class="py-4">
                        <span class="bg-purple-100 text-purple-700 text-xs px-2.5 py-1 rounded-full">Seminar</span>
                    </td>
                    <td class="py-4 text-gray-500">Apr 2024</td>
                    <td class="py-4 text-gray-400">—</td>
                    <td class="py-4">
                        <span class="bg-red-100 text-red-700 text-xs px-2.5 py-1 rounded-full">Ditolak</span>
                    </td>
                    <td class="py-4">
                        <button class="bg-[#0f3d2e] text-white text-xs px-3 py-1.5 rounded-lg hover:bg-[#0a2e21]">
                            Edit
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>