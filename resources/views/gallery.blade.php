@extends('template.layout')

@section('title', 'Gallery')

@section('content')
    <section id="galeri" class="w-100">
        <form action="/galeri" method="GET" class="form-inline w-25 d-flex gap-2">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
        @auth
            @if (auth()->user()->status == 'admin')
                <button type="button" class="btn btn-success w-100" style="hover: #989595" data-bs-toggle="modal"
                    data-bs-target="#addGallery">
                    <i class="bi bi-plus" style="font-size: 100px"></i>
                </button>
            @endif
        @endauth
        <br>
        <br>
        <br>
        @foreach ($galeriList->chunk(3) as $index => $chunk)
            <div class="d-flex-col w-100">
                @foreach ($chunk as $galeri)
                    <div class="card mb-3 w-100">
                        <div class="row g-0 w-100">
                            <div class="col-md-4" style="height: 250px; overflow:hidden">
                                <img src="{{ asset('storage/' . $galeri->gambar) }} "
                                    class="img-fluid w-100 h-100 rounded-start" alt="gallery-card"
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                                    @auth
                                        @if (auth()->user()->status == 'admin')
                                            <div class="row-s">
                                                <button type="button" id="" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $galeri->id }}" data-judul="{{ $galeri->judul }}"
                                                    data-deskripsi="{{ $galeri->deskripsi }}"
                                                    data-gambar="{{ asset('storage/' . $galeri->gambar) }}">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal" data-id="{{ $galeri->id }}">
                                                    Delete
                                                </button>
                                            </div>
                                        @endif
                                    @endauth

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="modal fade" id="addGallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Gallery</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add.gallery') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="col-form-label">Text</label>
                                <textarea class="form-control" id="text" name="deskripsi" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputPhoto" class="form-label">Upload Photo</label>
                                <input class="form-control" type="file" name="gambar" id="inputPhoto">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEdit" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit_id" name="id">
                            <div class="mb-3">
                                <label for="edit_title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="edit_title" name="judul" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_text" class="col-form-label">Text</label>
                                <textarea class="form-control" id="edit_text" name="deskripsi" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit_inputPhoto" class="form-label">Upload Photo</label>
                                <input class="form-control" type="file" name="gambar" id="edit_inputPhoto">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin menghapus gallery ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $galeriList->links('pagination::bootstrap-5') }}
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
        const exampleModal = document.getElementById('addGallery')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                // const recipient = button.getAttribute('data-bs-whatever')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = exampleModal.querySelector('.modal-title')
                const modalBodyInput = exampleModal.querySelector('.modal-body input')

                // modalTitle.textContent = New message to ${recipient}
                // modalBodyInput.value = recipient
            })
        }
        document.addEventListener('DOMContentLoaded', function() {
            const modalEdit = document.getElementById('modalEdit');

            modalEdit.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const judul = button.getAttribute('data-judul');
                const deskripsi = button.getAttribute('data-deskripsi');

                // Isi field modal edit
                modalEdit.querySelector('#edit_id').value = id;
                modalEdit.querySelector('#edit_title').value = judul;
                modalEdit.querySelector('#edit_text').value = deskripsi;

                // Atur URL form dengan benar
                const form = modalEdit.querySelector('#formEdit');
                form.action = `/galeri/update/${id}`;
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('confirmDeleteModal');
            const deleteForm = document.getElementById('deleteForm');

            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                deleteForm.action = `/galeri/delete/${id}`;
            });
        });
    </script>

@endsection
