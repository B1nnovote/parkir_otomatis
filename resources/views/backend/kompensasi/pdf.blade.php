<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 12px;
    }
    th, td {
      border: 1px solid black;
      padding: 6px;
    }
  </style>
</head>
<body>
  <h3>Data Kompensasi</h3>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Pemilik</th>
        <th>No Polisi</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Diajukan</th>
        <th>Diproses</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kompensasi as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->nama_pemilik }}</td>
          <td>{{ $item->kendaraanMasuk->dataKendaraan->no_polisi ?? '-' }}</td>
          <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
          <td>{{ ucfirst($item->status) }}</td>
          <td>{{ $item->diajukan_pada }}</td>
          <td>{{ $item->diproses_pada ?? '-' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
