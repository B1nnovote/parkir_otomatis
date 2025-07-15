<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kompensasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <style>
        .badge-status {
            font-size: 0.75rem;
            padding: 0.4em 0.6em;
            border-radius: 0.375rem;
            font-weight: 500;
        }
    </style>
</head>

<body>
    @include('layouts.part.sidebar')

    <section id="content">
        @include('layouts.part.navbar')

        <div class="container mt-5 pt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-semibold mb-3 ms-5" style="font-size:30px;">Data Kompensasi</h4>

                <div class="d-flex gap-2 me-5">
                    <a href="{{ route('kompensasi.export.pdf', request()->only(['status', 'nopol'])) }}" class="btn btn-danger">Export PDF</a>
                    <a href="{{ route('kompensasi.export.excel',  request()->only(['status', 'nopol']))  }}" class="btn btn-success">Export Excel</a>
                </div>
            </div>

            <form method="GET" class="row g-2 mb-3 ms-5">
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                            Pending</option>
                        <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>
                            Disetujui</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>
                            Ditolak</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="nopol" value="{{ request('nopol') }}" class="form-control"
                        placeholder="Cari No Polisi">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark"><i class="bx bx-filter"></i> Filter</button>
                    <a href="{{ route('kompensasi.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>

            <div class="card shadow-sm border-0 col-11 mx-auto">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('info'))
                        <div class="alert alert-info">{{ session('info') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemilik</th>
                                    <th>No Polisi</th>
                                    <th>Jumlah (Rp)</th>
                                    <th>Keterangan</th>
                                    <th>Bukti Foto</th>
                                    <th>Diajukan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kompensasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pemilik ?? '-' }}</td>
                                        <td>{{ $item->kendaraanMasuk->dataKendaraan->no_polisi ?? '-' }}</td>
                                        <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                        <td>{{ $item->keterangan ?? '-' }}</td>
                                        <td>
                                            @if ($item->bukti_foto)
                                                <a href="{{ asset('storage/' . $item->bukti_foto) }}" target="_blank"
                                                    class="btn btn-sm btn-secondary">Lihat</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->diajukan_pada)->format('d M Y H:i') }}</td>
                                        <td>
                                            <span
                                                class="badge badge-status 
                                               @if ($item->status == 'pending') bg-warning text-dark 
                                               @elseif($item->status == 'disetujui') bg-success 
                                               @else bg-danger @endif">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td class="d-flex justify-content-center gap-2 flex-wrap">
                                            <form action="{{ route('kompensasi.approve', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Setuju kompensasi ini?')">
                                                @csrf @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="bx bx-check"></i></button>
                                            </form>

                                            <form action="{{ route('kompensasi.reject', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Tolak kompensasi ini?')">
                                                @csrf @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="bx bx-x"></i></button>
                                            </form>

                                            <a href="{{ route('kompensasi.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">Belum ada pengajuan
                                            kompensasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('input[name="nopol"]').autocomplete({
                source: '{{ route('kompensasi.autocomplete-nopol') }}',
                minLength: 2,
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
