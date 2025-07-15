@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .rupiah {
            text-align: right;
        }
    </style>
</head>
<body>

    <h2>Data Pembayaran</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Bayar</th>
                <th>Plat Nomor</th>
                <th>Jenis Kendaraan</th>
                <th>Metode</th>
                <th>Jumlah</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                    <td>{{ $item->kendaraanMasuk->dataKendaraan->no_polisi ?? '-' }}</td>
                    <td>{{ ucfirst($item->kendaraanMasuk->dataKendaraan->jenis_kendaraan ?? '-') }}</td>
                    <td>{{ ucfirst($item->jenis_pembayaran) }}</td>
                    <td class="rupiah">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    <td>{{ $item->petugas->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
