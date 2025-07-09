@extends('layouts.part')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Data Kendaraan</h4>
        <a href="{{ route('datakendaraan.create') }}" class="btn btn-primary">Tambah Kendaraan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
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
                    @forelse ($dataKendaraan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->plat_nomor }}</td>
                            <td>{{ ucfirst($data->jenis) }}</td>
                            <td>{{ $data->pemilik}}</td>
                            <td>{{ $data->status_pemilik}}</td>
                            <td>
                                    @if(Auth::user()->isAdmin == 1)
                                        <a href="{{ route('datakendaraan.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('datakendaraan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    @else
                                        <a href="/datakendaraan/{{$data['id']}}"  class="btn btn-sm btn-info">Show</a>
                                    @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
