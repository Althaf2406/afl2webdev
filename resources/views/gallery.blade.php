@extends('template.layout')

@section('title', 'Gallery')

@section('content')
    <section id="galeri" class="w-100">
        @foreach ($galeriList->chunk(3) as $index => $chunk)
            <div class="d-flex-col w-100">
                @foreach ($chunk as $galeri)
                    <div class="w-100 d-flex gap-3" style="width: 100%; height: 200px;">
                        <img class="img-fluid rounded" src="{{ asset($galeri->gambar) }}" alt="">
                        <br>
                        <br>
                        <div class="d-flex-col">
                            <h4>{{ $galeri->judul }}</h4>
                            <p>{{ $galeri->deskripsi }}</p>
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
