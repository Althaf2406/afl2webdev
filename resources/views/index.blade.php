@extends('template.layout')

@section('title', 'Beranda - Tambang Pasir Jambi')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Welcome to the Index Page</h1>
        <p>This is the main view for your Laravel application.</p>
        <a href="{{ url('/create') }}" class="btn btn-primary">Create New</a>
    </div>


    <section id="partnerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($partnerList->chunk(3) as $index => $chunk)
                <div class="carousel-item @if ($index == 0) active @endif" data-bs-interval="3000">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($chunk as $partner)
                                <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-3 position-relative partner-card">
                                    <img src="{{ asset($partner->gambar) }}" class="img-fluid rounded shadow-sm"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="overlay d-flex align-items-center justify-content-center">
                                        <div class="overlay-text text-white fw-bold text-center">
                                            {{ $partner->nama }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#partnerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#partnerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>


@endsection
