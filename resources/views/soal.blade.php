@extends('layout.app')

@section('content')
    <h4>Soal Nomor {{ $soal->nomor }}</h4>
    <p>{{ $soal->pertanyaan }}</p>

    <form method="POST">
        @csrf
        <textarea name="jawaban" rows="6" class="form-control" required></textarea>

        <div class="mt-3 text-end">
            <button class="btn btn-primary">
                Simpan & Lanjut
            </button>
        </div>
    </form>
@endsection