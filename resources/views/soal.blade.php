@extends('layout.app')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <h4 class="mb-3">Soal Nomor {{ $soal->nomor }}</h4>
    {{-- Tampilkan gambar jika ada --}}
    @if (!empty($soal->nama_gambar))
        <div class="mb-3 flex justify-center">
            <img src="{{ asset('storage/soal/' . $soal->nama_gambar) }}" 
            alt="Gambar Soal"
            class="max-h-[620px] object-cover rounded-lg">
        </div>
    @endif

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
