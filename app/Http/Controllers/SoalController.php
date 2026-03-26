<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoalController extends Controller
{
    public function create()
    {
        // nomor otomatis lanjut
        $nomorTerakhir = Soal::max('nomor') ?? 0;

        return view('soal.create', [
            'nomor' => $nomorTerakhir + 1
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|integer|unique:soal,nomor',
            'pertanyaan' => 'required|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

            $namaGambar = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/soal', $namaGambar);
        }

        Soal::create([
            'nomor' => $request->nomor,
            'pertanyaan' => $request->pertanyaan,
            'nama_gambar' => $namaGambar
        ]);

        return redirect()->route('soalcreate')
            ->with('success', 'Soal berhasil ditambahkan');
    }
}