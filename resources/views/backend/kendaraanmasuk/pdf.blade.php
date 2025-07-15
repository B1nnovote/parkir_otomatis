<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Parkir Masuk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Data Parkir Masuk</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Masuk</th>
                <th>Status Parkir</th>
                <th>Plat Nomor</th>
                <th>Jenis Kendaraan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('d-m-Y H:i') }}</td>
                <td>{{ ucfirst($item->status_parkir) }}</td>
                <td>{{ $item->dataKendaraan->no_polisi ?? '-' }}</td>
                <td>{{ ucfirst($item->dataKendaraan->jenis_kendaraan ?? '-') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
