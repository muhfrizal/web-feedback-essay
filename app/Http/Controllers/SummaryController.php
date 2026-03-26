<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Soal;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(){
        $val = Soal::with(['user','jawaban.user'])
        ->paginate(1);

        return view('summary', compact('val'));
    }
}
