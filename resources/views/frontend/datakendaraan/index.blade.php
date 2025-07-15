<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('layouts.part.sidebar')

    <section id="content">
        @include('layouts.part.navbar')

        <main>
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="btn btn-sm btn-label-primary rounded-pill px-3 py-2" style="pointer-events: none; font-size:30px;">
                     Data Kendaraan
                    </span>
                        <a href="{{ route('datakendaraan.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Tambah
                        </a>                    
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Jenis</th>
                                        <th>Pemilik</th>
                                        <th>Status Pemilik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($dataKendaraan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->no_polisi }}</td>
                                            <td>{{ ucfirst($data->jenis_kendaraan) }}</td>
                                            <td>{{ $data->pemilik ?? '-' }}</td>
                                            <td>
                                                <span class="badge bg-info text-dark">{{ ucfirst($data->status_pemilik) }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">                                                  
                                                        <a href="{{ route('datakendaraan.edit', $data->id) }}"
                                                           class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                                           <k style=" font-size:20px;">|</k>
                                                        <form action="{{ route('datakendaraan.destroy', $data->id) }}"
                                                              method="POST" onsubmit="return confirm('Yakin hapus?')">
                                                            @csrf @method('DELETE')
                                                            <button class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                        <k style=" font-size:20px;">|</k>
                                                        <a href="/datakendaraan/{{ $data->id }}"
                                                           class="btn btn-sm btn-info"><i class="bx bx-show"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if($dataKendaraan->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada data kendaraan.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
