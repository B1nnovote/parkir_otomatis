<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laporan Keuangan</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 12px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      border: 1px solid #000;
      padding: 6px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    h3 {
      text-align: center;
      margin-bottom: 0;
    }

    .text-center {
      text-align: center;
    }

    .small {
      font-size: 10px;
      color: gray;
    }
  </style>
</head>
<body>
  <h3>Laporan Keuangan Sistem Parkir</h3>
  <p class="text-center small">Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Jenis Transaksi</th>
        <th>Jumlah</th>
        <th>Waktu Transaksi</th>
        <th>Keterangan</th>
        <th>No Polisi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ ucfirst($item->jenis_transaksi) }}</td>
          <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
          <td>{{ \Carbon\Carbon::parse($item->waktu_transaksi)->format('d-m-Y H:i') }}</td>
          <td>{{ $item->keterangan }}</td>
          <td>{{ $item->pembayaran->kendaraanMasuk->dataKendaraan->no_polisi ?? '-' }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Tidak ada data keuangan.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</body>
</html>
