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
                <hr class="mx-auto"
                    style="width: 80px; height: 3px; background-color: #ffb300; border: none; border-radius: 2px;">
            </div>

            <!-- Product Grid -->
            <div class="row g-4">
                @foreach ($product as $pds)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100"
                            style="width: 100%; background-color: #1a1a1a; color: white;">
                            <!-- Gambar Produk -->
                            <img src="{{ asset($pds->image) }}" class="card-img-top" alt="{{ $pds->name }}"
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
                                @if (is_array($pds->specification))
                                    @foreach ($pds->specification as $key => $value)
                                        <li class="list-group-item d-flex justify-content-between"
                                            style="background-color: #1a1a1a; color: #fff;">
                                            <span class="text-capitalize">{{ $key }}</span>
                                            <span class="fw-semibold">{{ $value }}</span>
                                        </li>
                                    @endforeach
                                @endif
                                <li class="list-group-item d-flex justify-content-between"
                                    style="background-color: #1a1a1a; color: #fff;">
                                    <span>Ketersediaan</span>
                                    <span class="fw-semibold {{ $pds->availability ? 'text-success' : 'text-danger' }}">
                                        {{ $pds->availability ? 'Tersedia' : 'Habis' }}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between"
                                    style="background-color: #1a1a1a; color: #fff;">
                                    <span>Harga</span>
                                    <span class="fw-semibold" style="color: #ffb300;">
                                        Rp {{ number_format($pds->price_per_m3, 0, ',', '.') }} / {{ $pds->unit }}
                                    </span>
                                </li>
                            </ul>

                            <!-- Aksi -->
                            <div class="card-body d-flex justify-content-between">
                                <a href="{{ url('/product' . $pds->slug) }}" class="card-link"
                                    style="color: #ffb300;">Detail</a>
                                <a href="{{ url('/quotation/create') . '?product=' . $pds->id }}" class="card-link"
                                    style="color: #00c853;">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @auth
                @if (auth()->user()->status == 'admin')
                    <div class="container py-5" style="background-color: #000; color: #fff;">
                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                <!-- Judul Form -->
                                <h3 class="fw-bold text-center mb-4" style="color: #ffb300;">Tambah Produk Baru</h3>

                                <form method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Nama Produk -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Nama Produk</label>
                                        <input type="text" name="name" class="form-control border-0 shadow-sm"
                                            placeholder="Contoh: Pasir Silika" style="background-color: #1a1a1a; color: #fff;">
                                    </div>

                                    <!-- Slug -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Slug</label>
                                        <input type="text" name="slug" class="form-control border-0 shadow-sm"
                                            placeholder="contoh: pasir-silika" style="background-color: #1a1a1a; color: #fff;">
                                        <small class="text-secondary">Slug digunakan untuk URL produk.</small>
                                    </div>

                                    <!-- Short Description -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Deskripsi Singkat</label>
                                        <input type="text" name="short_description" class="form-control border-0 shadow-sm"
                                            placeholder="Ringkasan singkat produk..."
                                            style="background-color: #1a1a1a; color: #fff;">
                                    </div>

                                    <!-- Deskripsi Lengkap -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Deskripsi Lengkap</label>
                                        <textarea name="description" rows="5" class="form-control border-0 shadow-sm"
                                            placeholder="Tuliskan detail lengkap produk..." style="background-color: #1a1a1a; color: #fff;"></textarea>
                                    </div>

                                    <!-- Upload Gambar -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Gambar Produk</label>
                                        <input type="file" name="image" class="form-control border-0 shadow-sm"
                                            style="background-color: #1a1a1a; color: #fff;">
                                        <small class="text-secondary">Upload gambar utama produk.</small>
                                    </div>

                                    <!-- Spesifikasi (JSON input) -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Spesifikasi</label>
                                        <textarea name="specification" rows="3" class="form-control border-0 shadow-sm"
                                            placeholder='Contoh: {"Kadar Silika": "99%", "Ukuran Butir": "0.1 - 2 mm"}'
                                            style="background-color: #1a1a1a; color: #fff;"></textarea>
                                        <small class="text-secondary">Masukkan dalam format JSON (kunci dan nilai).</small>
                                    </div>

                                    <!-- Ketersediaan -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Ketersediaan</label>
                                        <select name="availability" class="form-select border-0 shadow-sm"
                                            style="background-color: #1a1a1a; color: #fff;">
                                            <option value="1">Tersedia</option>
                                            <option value="0">Habis</option>
                                        </select>
                                    </div>

                                    <!-- Harga per m3 -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Harga per m³</label>
                                        <input type="number" name="price_per_m3" class="form-control border-0 shadow-sm"
                                            placeholder="Contoh: 500000" style="background-color: #1a1a1a; color: #fff;">
                                    </div>

                                    <!-- Unit -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Satuan</label>
                                        <input type="text" name="unit" class="form-control border-0 shadow-sm"
                                            placeholder="Contoh: m3" style="background-color: #1a1a1a; color: #fff;">
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Status</label>
                                        <select name="status" class="form-select border-0 shadow-sm"
                                            style="background-color: #1a1a1a; color: #fff;">
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn px-5 py-2 fw-semibold"
                                            style="background-color: #ffb300; color: #000; border-radius: 50px;">
                                            Simpan Produk
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>



            </div>
            @endif
        @endauth

    </section>

@endsection
