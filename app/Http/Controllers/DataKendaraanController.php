<?php
namespace App\Http\Controllers;

use App\Models\DataKendaraan;
use Illuminate\Http\Request;

// id	no_polisi	jenis_kendaraan	pemilik	status_pemilik	created_at	updated_at

class DataKendaraanController extends Controller
{
    public function index()
    {
        $dataKendaraan = DataKendaraan::all();
        return view('backend.datakendaraan.index', compact('dataKendaraan'));
    }

    public function create()
    {
        return view('backend.datakendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_polisi'       => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string',
            'pemilik'         => 'required|string',
            'status_pemilik'  => 'required|string',
        ]);


        DataKendaraan::create($request->all());

        return redirect()->route('datakendaraan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $data = DataKendaraan::findOrFail($id);
        return view('backend.datakendaraan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = DataKendaraan::findOrFail($id);
        return view('backend.datakendaraan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_polisi'       => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string',
            'pemilik'         => 'required|string',
            'status_pemilik'  => 'required|string',
        ]);

        $data = DataKendaraan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('datakendaraan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = DataKendaraan::findOrFail($id);
        $data->delete();

        return redirect()->route('datakendaraan.index')->with('success', 'Data berhasil dihapus!');
    }
}
