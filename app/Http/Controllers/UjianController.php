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
        $user = auth()->user();

        $progres = Progres::firstOrCreate(
            ['user_id' => $user->id],
            ['soal_terakhir' => 0]
        );

        $jmlSoal = Soal::get()->count();

        // Pencegahan lompat soal
        if ($nomor != $progres->soal_terakhir + 1) {
            return redirect()->route('soal', $progres->soal_terakhir + 1);
        } else if ($nomor > $jmlSoal) {
            return redirect()->route('sudahmengisi');
        }

        $soal = Soal::where('nomor', $nomor)->firstOrFail();

        return view('soal', compact('soal', 'jmlSoal'));
    }

    public function simpan(Request $request, $nomor)
    {
        $request->validate([
            'jawaban' => 'required'
        ]);

        $user = auth()->user();

        $soal = Soal::where('nomor', $nomor)->firstOrFail();

        Jawaban::create([
            'user_id' => $user->id,
            'soal_id' => $soal->id,
            'jawaban' => $request->jawaban
        ]);

        Progres::where('user_id', $user->id)
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

    public function sudahmengisi()
    {
        return view('sudahmengisi');
    }
}
