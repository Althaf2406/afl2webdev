@extends('template.layout')
@section('title', 'Product - Tambang Pasir Jambi')

@section('content')
    <!-- Section Product -->
<section id="our-product" class="py-5" style="scroll-margin-top: 100px; background-color: #000;">
    <div class="container my-5">

        <!-- Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #ffffff;">Our Product</h2>
            <p style="color: #d1d1d1;">Temukan berbagai produk unggulan dari Tambang Pasir Jambi</p>
            <hr class="mx-auto" style="width: 80px; height: 3px; background-color: #ffb300; border: none; border-radius: 2px;">
        </div>

        <!-- Product Grid -->
        <div class="row g-4">
            @foreach($product as $pds)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100" style="width: 100%; background-color: #1a1a1a; color: white;">
                        <!-- Gambar Produk -->
                        <img src="{{ asset($pds->image) }}" 
                             class="card-img-top" 
                             alt="{{ $pds->name }}" 
                             style="height: 220px; object-fit: cover; border-bottom: 3px solid #ffb300;">

                        <!-- Body -->
                        <div class="card-body">
                            <h5 class="card-title fw-bold" style="color: #fff;">{{ $pds->name }}</h5>
                            <p class="card-text text-muted mb-2" style="color: #ccc;">
                                {{ $pds->short_description }}
                            </p>
                            <p class="small" style="color: #aaa;">
                                {!! Str::limit(strip_tags($pds->description), 100) !!}
                            </p>
                        </div>

                        <!-- Spesifikasi -->
                        <ul class="list-group list-group-flush" style="background-color: #1a1a1a;">
                            @if(is_array($pds->specification))
                                @foreach($pds->specification as $key => $value)
                                    <li class="list-group-item d-flex justify-content-between" style="background-color: #1a1a1a; color: #fff;">
                                        <span class="text-capitalize">{{ $key }}</span>
                                        <span class="fw-semibold">{{ $value }}</span>
                                    </li>
                                @endforeach
                            @endif
                            <li class="list-group-item d-flex justify-content-between" style="background-color: #1a1a1a; color: #fff;">
                                <span>Ketersediaan</span>
                                <span class="fw-semibold {{ $pds->availability ? 'text-success' : 'text-danger' }}">
                                    {{ $pds->availability ? 'Tersedia' : 'Habis' }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between" style="background-color: #1a1a1a; color: #fff;">
                                <span>Harga</span>
                                <span class="fw-semibold" style="color: #ffb300;">
                                    Rp {{ number_format($pds->price_per_m3, 0, ',', '.') }} / {{ $pds->unit }}
                                </span>
                            </li>
                        </ul>

                        <!-- Aksi -->
                        <div class="card-body d-flex justify-content-between">
                            <a href="{{ url('/product/' . $pds->slug) }}" class="card-link" style="color: #ffb300;">Detail</a>
                            <a href="{{ url('/quotation/create') . '?product=' . $pds->id }}" class="card-link" style="color: #00c853;">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
