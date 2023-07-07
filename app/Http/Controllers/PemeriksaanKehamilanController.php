<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanKehamilan;
use App\Models\RiwayatKehamilan;
use Illuminate\Http\Request;

class PemeriksaanKehamilanController extends Controller
{

    public function index($id_kehamilan)
    {
        $riwayatKehamilan = RiwayatKehamilan::findOrFail($id_kehamilan);
        $pemeriksaanKehamilan = $riwayatKehamilan->pemeriksaanKehamilan;
    
        if ($pemeriksaanKehamilan) {
            return view('riwayat_kehamilan.pemeriksaan.index', compact('riwayatKehamilan', 'pemeriksaanKehamilan'));
        }
    
        return redirect()->back()->with('error', 'Tidak ada data pemeriksaan kehamilan yang tersedia.');
    }

    public function create($id_kehamilan)
    {
        $riwayatKehamilan = RiwayatKehamilan::findOrFail($id_kehamilan);

        return view('riwayat_kehamilan.pemeriksaan.create', compact('riwayatKehamilan'));
    }

    public function store(Request $request, $id_kehamilan)
    {
        $request->validate([
            'lingkar_perut' => 'required',
            'tb_ibu' => 'required',
            'bb_ibu' => 'required',
            'sistole' => 'required',
            'diastole' => 'required',
        ]);

        $riwayatKehamilan = RiwayatKehamilan::findOrFail($id_kehamilan);

        $pemeriksaanKehamilan = new PemeriksaanKehamilan([
            'lingkar_perut' => $request->lingkar_perut,
            'tb_ibu' => $request->tb_ibu,
            'bb_ibu' => $request->bb_ibu,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
        ]);

        $riwayatKehamilan->pemeriksaanKehamilan()->save($pemeriksaanKehamilan);

        return redirect()->route('riwayat-kehamilan.pemeriksaan.index', $riwayatKehamilan->id_kehamilan)
            ->with('success', 'Pemeriksaan kehamilan berhasil ditambahkan.');
    }
}
