<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kartu SKP - {{ $user->name }}</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
            color: #1a1a1a;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 16px;
        }

        .header h1 {
            font-size: 16px;
            margin: 0 0 4px 0;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        hr {
            border: none;
            border-top: 1.5px solid #333;
            margin: 14px 0;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 2px 0;
            font-size: 12px;
        }

        .info-table td.label {
            width: 140px;
        }

        .info-table td.colon {
            width: 15px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data th,
        table.data td {
            border: 1px solid #999;
            padding: 6px 8px;
            font-size: 11px;
        }

        table.data th {
            background-color: #E8E4DC;
            text-align: center;
            font-weight: bold;
        }

        table.data td.center {
            text-align: center;
        }

        table.data td.no {
            text-align: center;
            width: 30px;
        }

        .total-row td {
            font-weight: bold;
            background-color: #f5f5f0;
        }

        .footer-note {
            margin-top: 30px;
            font-size: 10px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Kartu Satuan Kredit Partisipasi (SKP) Mahasiswa</h1>
        <h2>Fakultas Matematika dan Ilmu Pengetahuan Alam</h2>
    </div>

    <hr>

    <table class="info-table">
        <tr>
            <td class="label">NIM</td>
            <td class="colon">:</td>
            <td>{{ $user->nim }}</td>
        </tr>
        <tr>
            <td class="label">Nama</td>
            <td class="colon">:</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td class="label">Program Studi</td>
            <td class="colon">:</td>
            <td>{{ $user->major->name ?? '-' }}</td>
        </tr>
    </table>

    <table class="data">
        <thead>
            <tr>
                <th style="width: 30px;">No</th>
                <th style="width: 90px;">Tanggal Kegiatan</th>
                <th>Nama Kegiatan / Sertifikat</th>
                <th style="width: 90px;">Partisipasi</th>
                <th style="width: 50px;">Bobot</th>
                <th style="width: 60px;">Validasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($skps as $i => $skp)
            <tr>
                <td class="no">{{ $i + 1 }}</td>
                <td class="center">
                    {{ \Carbon\Carbon::parse($skp->start_date)->format('d/m/Y') }}
                    @if($skp->end_date && $skp->end_date != $skp->start_date)
                    - {{ \Carbon\Carbon::parse($skp->end_date)->format('d/m/Y') }}
                    @endif
                </td>
                <td>{{ $skp->name }}</td>
                <td class="center">{{ $skp->skpDetail->partisipasi->name ?? '-' }}</td>
                <td class="center">
                    {{ $skp->status === 'approved' ? ($skp->skpDetail->bobot) : ($skp->skpDetail->bobot) }}
                </td>
                <td class="center">
                    {{ $skp->status === 'approved' ? 'Valid' : 'Belum Valid' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="center">Belum ada sertifikat yang tervalidasi.</td>
            </tr>
            @endforelse

            <tr class="total-row">
                <td colspan="4" class="center">Total Jumlah SKP</td>
                <td class="center">{{ $totalBobot }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="footer-note">
        Dicetak pada {{ \Carbon\Carbon::now()->format('d F Y, H:i') }} WIB melalui SISAKTI+.
    </div>

</body>

</html>