<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Data Kendaraan</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Plat Nomor</th>
                <th>Jenis</th>
                <th>Pemilik</th>
                <th>Status Pemilik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataKendaraan as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->no_polisi }}</td>
                    <td>{{ ucfirst($data->jenis_kendaraan) }}</td>
                    <td>{{ $data->pemilik }}</td>
                    <td>{{ ucfirst($data->status_pemilik) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
