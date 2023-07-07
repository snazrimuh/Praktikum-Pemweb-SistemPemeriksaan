<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IbuController extends Controller
{
    public function index()
    {
        $ibu = Ibu::all();
        return view('ibu.index', compact('ibu'));
    }
    public function index_user()
    {
        $ibu = Ibu::all();
        return view('user.ibu_index', compact('ibu'));
    }

    public function create()
    {
        return view('ibu.create', ['ibu' => new Ibu()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik_ibu' => 'required|integer',
            'nama_ibu' => 'required|string|max:50',
            'alamat_ibu' => 'required|string|max:100',
            'tgl_lahir_ibu' => 'required|date',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto profil
        ]);

        $data = $request->all();

        // Mengambil file foto dari request
        if ($request->hasFile('foto_profil')) {
            $foto = $request->file('foto_profil');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            // Simpan foto ke direktori penyimpanan (misalnya, dalam folder 'public/foto_profil')
            $foto->storeAs('public/foto_profil', $namaFoto);

            // Simpan nama file foto ke dalam data
            $data['foto_profil'] = $namaFoto;
        }
        Ibu::create($data);

        return redirect()->route('ibu.index')->with('success', 'Data Ibu berhasil ditambahkan.');
    }
        
    public function edit(Ibu $ibu)
    {
        return view('ibu.edit', compact('ibu'));
    }

    public function update(Request $request, Ibu $ibu)
    {
        $request->validate([
            'nik_ibu' => 'required|integer',
            'nama_ibu' => 'required|string|max:50',
            'alamat_ibu' => 'required|string|max:100',
            'tgl_lahir_ibu' => 'required|date',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->except('foto_profil');

        if ($request->hasFile('foto_profil')) {
            $foto = $request->file('foto_profil');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $foto->storeAs('public/foto_profil', $namaFoto);

            if ($ibu->foto_profil) {
                Storage::delete('public/foto_profil/' . $ibu->foto_profil);
            }

            $data['foto_profil'] = $namaFoto;
        }

        $ibu->update($data);

        return redirect()->route('ibu.index')->with('success', 'Data Ibu berhasil diperbarui.');
    }

    public function destroy(Ibu $ibu)
    {
        if ($ibu->foto_profil) {
            Storage::delete('public/foto_profil/' . $ibu->foto_profil);
        }

        $ibu->delete();

        return redirect()->route('ibu.index')->with('success', 'Data Ibu berhasil dihapus.');
    }
}
