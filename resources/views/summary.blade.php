@extends('layout.app')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    @foreach ($val as $post)
        <div class="flex items-center mb-3">
            <div class="w-10 h-10 bg-blue-500  rounded-full mr-3 flex items-center justify-center font-semibold">
                {{ $val->firstItem() + $loop->index }}
            </div>
            <div>
                <p class="font-bold mb-4">{{ $post->pertanyaan }}</p>
                <img src="{{ asset('storage/' . '1.png') }}" class="max-h-[620px] w-full object-cover rounded-lg">
            </div>
        </div>

        <div class="mb-3">
            <p> Masukan dan Komentar Peserta </p>
        </div>

        <div class="mt-4">
        @foreach ($post->jawaban as $jwb)
        <div class="flex mb-2">
            <div class="w-8 h-8 bg-gray-300 rounded-full mr-2"></div>
            <div class="bg-gray-100 rounded-lg px-3 py-2 w-full">
                <p class="text-sm font-semibold">{{ $jwb->user->name }}</p>
                <p class="text-sm">{{ $jwb->jawaban }}</p>
            </div>
        </div>
        @endforeach

        </div>
    @endforeach
    <div class="mt-6 flex justify-center">
        {{ $val->links('pagination::tailwind') }}
    </div>
@endsection
