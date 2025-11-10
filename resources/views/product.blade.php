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

            @auth
                @if (auth()->user()->status == 'admin')
                    <button type="button" class="btn btn-success w-100" style="hover: #989595" data-bs-toggle="modal"
                        data-bs-target="#addProduct">
                        <i class="bi bi-plus" style="font-size: 100px"></i>
                    </button>
                @endif
            @endauth

            <br>
            <br>
            <br>

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

            <!-- Modal Tambah Produk -->
            <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-dark">
                        <div class="modal-header" style="background-color: #ffb300;">
                            <h5 class="modal-title fw-bold" id="addProductLabel">Tambah Produk Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body bg-dark text-light">
                            <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Nama Produk -->
                                <div class="mb-3">
                                    <label for="name" class="form-label text-warning">Nama Produk</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control bg-secondary text-light border-0"
                                        placeholder="Contoh: Pasir Silika" required>
                                </div>

                                <!-- Deskripsi Singkat -->
                                <div class="mb-3">
                                    <label for="short_description" class="form-label text-warning">Deskripsi
                                        Singkat</label>
                                    <input type="text" name="short_description" id="short_description"
                                        class="form-control bg-secondary text-light border-0"
                                        placeholder="Ringkasan singkat produk..." required>
                                </div>

                                <!-- Deskripsi Lengkap -->
                                <div class="mb-3">
                                    <label for="description" class="form-label text-warning">Deskripsi Lengkap</label>
                                    <textarea name="description" id="description" rows="4" class="form-control bg-secondary text-light border-0"
                                        placeholder="Tuliskan detail lengkap produk..." required></textarea>
                                </div>

                                <!-- Upload Gambar -->
                                <div class="mb-3">
                                    <label for="image" class="form-label text-warning">Upload Gambar Produk</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control bg-secondary text-light border-0" accept="image/*" required>
                                    <small class="text-muted">Upload gambar utama produk.</small>
                                </div>

                                <!-- Spesifikasi (JSON input) -->
                                <div class="mb-3">
                                    <label for="specification" class="form-label text-warning">Spesifikasi</label>
                                    <textarea name="specification" id="specification" rows="3"
                                        class="form-control bg-secondary text-light border-0"
                                        placeholder='Contoh: {"Kadar Silika": "99%", "Ukuran Butir": "0.1 - 2 mm"}'></textarea>
                                    <small class="text-muted">Masukkan dalam format JSON (kunci dan nilai).</small>
                                </div>

                                <!-- Ketersediaan -->
                                <div class="mb-3">
                                    <label for="availability" class="form-label text-warning">Ketersediaan</label>
                                    <select name="availability" id="availability"
                                        class="form-select bg-secondary text-light border-0">
                                        <option value="1">Tersedia</option>
                                        <option value="0">Habis</option>
                                    </select>
                                </div>

                                <!-- Harga -->
                                <div class="mb-3">
                                    <label for="price_per_m3" class="form-label text-warning">Harga (Rp/m³)</label>
                                    <input type="number" name="price_per_m3" id="price_per_m3"
                                        class="form-control bg-secondary text-light border-0" placeholder="Contoh: 500000"
                                        required>
                                </div>

                                <!-- Unit -->
                                <div class="mb-3">
                                    <label for="unit" class="form-label text-warning">Satuan</label>
                                    <input type="text" name="unit" id="unit"
                                        class="form-control bg-secondary text-light border-0" placeholder="Contoh: m³"
                                        required>
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label text-warning">Status</label>
                                    <select name="status" id="status"
                                        class="form-select bg-secondary text-light border-0">
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>

                                <!-- Tombol -->
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-warning text-dark fw-bold">Tambah
                                        Produk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Edit Produk -->
            <div class="modal fade" id="modalEditProduct" tabindex="-1" aria-labelledby="modalEditProductLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-dark">
                        <div class="modal-header" style="background-color: #ffb300;">
                            <h5 class="modal-title fw-bold" id="modalEditProductLabel">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
