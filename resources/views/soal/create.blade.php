@extends('layout.app')

@section('content')
<h4>Tambah Soal</h4>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('soal.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nomor Soal</label>
        <input type="number"
               name="nomor"
               class="form-control"
               value="{{ $nomor }}"
               readonly>
    </div>

    <div class="mb-3">
        <label>Soal</label>
        <textarea name="pertanyaan"
                  class="form-control"
                  rows="5"
                  required></textarea>
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        <input type="file"
               name="gambar"
               class="form-control"
               accept="image/*">
    </div>

    <button class="btn btn-primary">
        Simpan
    </button>
</form>
@endsection