<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kendaraan Keluar</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f3f3f3;
        }

        h2 {
            text-align: center;
            margin-bottom: 0;
        }

        .meta {
            font-size: 11px;
            text-align: right;
        }
    </style>
</head>
<body>

    <h2>Laporan Data Kendaraan Keluar</h2>
    <p class="meta">Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Plat Nomor</th>
                <th>Jenis Kendaraan</th>
                <th>Waktu Keluar</th>
                <th>Status Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->kendaraanMasuk->dataKendaraan->no_polisi ?? '-' }}</td>
                    <td>{{ ucfirst($item->kendaraanMasuk->dataKendaraan->jenis_kendaraan ?? '-') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_keluar)->format('d-m-Y H:i') }}</td>
                    <td>{{ $item->status_kondisi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
