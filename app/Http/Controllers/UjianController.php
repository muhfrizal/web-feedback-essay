<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progres;
use App\Models\Soal;
use App\Models\Jawaban;

class UjianController extends Controller
{
    public function soal($nomor)
    {
        // $user = auth()->user();

        $progres = Progres::firstOrCreate(
            // ['user_id' => $user->id],
            ['user_id' => 1],
            ['soal_terakhir' => 0]
        );

        // Pencegahan lompat soal
        if ($nomor != $progres->soal_terakhir + 1) {
            return redirect()->route('soal', $progres->soal_terakhir + 1);
        }

        $soal = Soal::where('nomor', $nomor)->firstOrFail();

        return view('soal', compact('soal'));
    }

    public function simpan(Request $request, $nomor)
    {
        $request->validate([
            'jawaban' => 'required'
        ]);

        $soal = Soal::where('nomor', $nomor)->firstOrFail();

        Jawaban::create([
            'user_id' => 1,
            'soal_id' => $soal->id,
            'jawaban' => $request->jawaban
        ]);

        Progres::where('user_id', 1)
            ->update(['soal_terakhir' => $nomor]);

        $next = Soal::where('nomor', $nomor + 1)->exists();

        return $next
            ? redirect()->route('soal', $nomor + 1)
            : redirect()->route('selesai');
    }

    public function selesai()
    {
        return view('selesai');
    }
}
