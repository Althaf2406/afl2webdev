@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Produk</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mb-3" method="GET" action="{{ url()->current() }}">
        <div class="input-group">
            <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari produk...">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    @if($products->count())
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th style="width:80px">Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height:60px;">
                                @else
                                    <div class="bg-light text-muted text-center" style="height:60px;line-height:60px;">No Image</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.show', $product) }}" class="fw-semibold text-decoration-none">{{ $product->name }}</a>
                                @if($product->short_description)
                                    <div class="text-muted small">{{ Str::limit($product->short_description, 80) }}</div>
                                @endif
                            </td>
                            <td>{{ $product->category?->name ?? '-' }}</td>
                            <td class="text-end">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $product->stock ?? 0 }}</td>
                            <td class="text-end">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() ?? $products->count() }} produk</div>
            <div>{{ $products->withQueryString()->links() }}</div>
        </div>
    @else
        <div class="alert alert-info">Tidak ada produk. Klik "Tambah Produk" untuk mulai menambahkan.</div>
    @endif
</div>
@endsection