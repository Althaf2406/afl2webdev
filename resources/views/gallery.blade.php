@extends('template.layout')

@section('title', 'Gallery')

@section('content')
<section id="gallery" class="w-100">
    @foreach ($galeriList->chunk(3) as $index => $chunk)
        <div class="flex-col w-100 px-5 align-items-center" style="">
            @foreach ($chunk as $galeri)
                <div class="w-100 d-flex gap-3" style="width: 100%; height: auto; min-height: 200px;">
                    <img class="img-fluid rounded" src="{{ asset($galeri->gambar) }}" alt="" style="width: 250px; height: 180px; object-fit: cover;">
                    <div class="d-flex-col">
                        <h4 class="mb-2">{{ $galeri->judul }}</h4>
                        <p class="mb-1">{{ $galeri->deskripsi }}</p>
                        {{-- <small class="text-muted">
                            🕓 Diambil pada: {{ \Carbon\Carbon::parse($galeri->tanggal_diambil)->format('d M Y') }}
                        </small> --}}
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $galeriList->links('pagination::bootstrap-5') }}
    </div>
</section>
@endsection
