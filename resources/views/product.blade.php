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

                            <!-- Edit dan Hapus (Admin) -->
                            @auth
                                @if (auth()->user()->status == 'admin')
                                    <div class="card-body d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-sm"
                                            style="background-color: #ffb300; color: #000;" data-bs-toggle="modal"
                                            data-bs-target="#modalEditProduct" data-id="{{ $pds->id }}"
                                            data-name="{{ $pds->name }}"
                                            data-short_description="{{ $pds->short_description }}"
                                            data-description="{{ $pds->description }}"
                                            data-price_per_m3="{{ $pds->price_per_m3 }}" data-unit="{{ $pds->unit }}"
                                            data-availability="{{ $pds->availability ? '1' : '0' }}">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal" data-id="{{ $pds->id }}">
                                            Delete
                                        </button>

                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal Edit Produk -->
            <div class="modal fade" id="modalEditProduct" tabindex="-1" aria-labelledby="modalEditProductLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-dark">
                        <div class="modal-header" style="background-color: #ffb300;">
                            <h5 class="modal-title fw-bold" id="modalEditProductLabel">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body bg-dark text-light">
                            <form id="formEditProduct" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" id="edit_id" name="id">

                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Nama</label>
                                    <input type="text" id="edit_name" name="name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_slug" class="form-label">Slug (opsional)</label>
                                    <input type="text" id="edit_slug" name="slug" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="edit_short_description" class="form-label">Short Description</label>
                                    <textarea id="edit_short_description" name="short_description" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_description" class="form-label">Description</label>
                                    <textarea id="edit_description" name="description" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_specification" class="form-label">Specification (JSON atau
                                        teks)</label>
                                    <textarea id="edit_specification" name="specification" class="form-control"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_price_per_m3" class="form-label">Price per m3</label>
                                    <input type="number" step="0.01" id="edit_price_per_m3" name="price_per_m3"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_unit" class="form-label">Unit</label>
                                    <input type="text" id="edit_unit" name="unit" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_availability" class="form-label">Availability</label>
                                    <select id="edit_availability" name="availability" class="form-select" required>
                                        <option value="1">Available</option>
                                        <option value="0">Not available</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_status" class="form-label">Status</label>
                                    <select id="edit_status" name="status" class="form-select" required>
                                        <option value="draft">draft</option>
                                        <option value="published">published</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="edit_image" class="form-label">Ganti Gambar (opsional)</label>
                                    <input type="file" id="edit_image" name="image" class="form-control"
                                        accept="image/*">
                                </div>

                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal Konfirmasi Delete -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah kamu yakin ingin menghapus produk ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                                            placeholder="Contoh: Pasir Silika"
                                            style="background-color: #1a1a1a; color: #fff;">
                                    </div>

                                    <!-- Slug -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Slug</label>
                                        <input type="text" name="slug" class="form-control border-0 shadow-sm"
                                            placeholder="contoh: pasir-silika"
                                            style="background-color: #1a1a1a; color: #fff;">
                                        <small class="text-secondary">Slug digunakan untuk URL produk.</small>
                                    </div>

                                    <!-- Short Description -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Deskripsi
                                            Singkat</label>
                                        <input type="text" name="short_description"
                                            class="form-control border-0 shadow-sm" placeholder="Ringkasan singkat produk..."
                                            style="background-color: #1a1a1a; color: #fff;">
                                    </div>

                                    <!-- Deskripsi Lengkap -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #ffb300;">Deskripsi
                                            Lengkap</label>
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
    <style>
        .btn-success {
            background-color: #B2B0B0;
            outline: 2px dashed;
        }

        .btn-success:hover {
            background-color: #989595
        }

        .btn-success:focus,
        .btn-success:active {
            background-color: #989595 !important;
            box-shadow: none !important;
            outline: 2px dashed !important;
        }

        #addGallery .modal-content,
        #modalEdit .modal-content,
        #confirmDeleteModal .modal-content {
            color: black;
        }
    </style>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // === Modal Tambah Product ===
        //     const addProductModal = document.getElementById('addProduct');
        //     if (addProductModal) {
        //         addProductModal.addEventListener('show.bs.modal', event => {
        //             const button = event.relatedTarget;
        //             // Bisa diisi nanti kalau kamu mau tambahin data attribute untuk "edit dari modal tambah"
        //         });
        //     }

        document.addEventListener('DOMContentLoaded', function() {
            // === Modal Edit Product ===
            const editModal = document.getElementById('modalEditProduct');
            const editForm = document.getElementById('formEditProduct');

            if (editModal && editForm) {
                editModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;

                    // Ambil data dari tombol edit
                    const id = button.getAttribute('data-id');
                    const name = button.getAttribute('data-name');
                    const shortDesc = button.getAttribute('data-short_description');
                    const desc = button.getAttribute('data-description');
                    const price = button.getAttribute('data-price_per_m3');
                    const unit = button.getAttribute('data-unit');
                    const avail = button.getAttribute('data-availability');

                    // Set action URL
                    editForm.action = `/product/update/${id}`;

                    // Isi form fields
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_name').value = name;
                    document.getElementById('edit_short_description').value = shortDesc;
                    document.getElementById('edit_description').value = desc;
                    document.getElementById('edit_price_per_m3').value = price;
                    document.getElementById('edit_unit').value = unit;
                    document.getElementById('edit_availability').value = avail;
                });
            }

            // === Modal Delete Product ===
            const deleteModal = document.getElementById('confirmDeleteModal');
            const deleteForm = document.getElementById('deleteForm');

            if (deleteModal && deleteForm) {
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-id');
                    deleteForm.action = `/product/delete/${id}`;
                });
            }
        });
    </script>


@endsection
