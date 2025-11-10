<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk, dengan pencarian optional.
     */
    public function product(Request $request)
    {
        if ($request->has('search')) {
            $product = Product::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('short_description', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->paginate(6);
        } else {
            $product = Product::paginate(6);
        }

        return view('product', compact('product'));
    }

    /**
     * Menyimpan data produk baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'specification' => 'nullable|string',
            'availability' => 'required|boolean',
            'price_per_m3' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'status' => 'required|string|in:draft,published',
        ]);

        // Simpan gambar
        $path = $request->file('image')->store('product_images', 'public');

        // Simpan ke database
        Product::create([
            'name' => $request->name,
            'slug' => $request->slug ?? strtolower(str_replace(' ', '-', $request->name)),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => 'storage/' . $path,
            'specification' => $this->parseSpecification($request->specification),
            'availability' => $request->availability,
            'price_per_m3' => $request->price_per_m3,
            'unit' => $request->unit,
            'status' => $request->status,
        ]);

        return redirect('/product')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Memperbarui produk.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'specification' => 'nullable|string',
            'availability' => 'required|boolean',
            'price_per_m3' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'status' => 'required|string|in:draft,published',
        ]);

        // Jika gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($product->image && Storage::disk('public')->exists(str_replace('storage/', '', $product->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->image));
            }

            // Simpan gambar baru
            $path = $request->file('image')->store('product_images', 'public');
            $product->image = 'storage/' . $path;
        }

        $product->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'specification' => $this->parseSpecification($request->specification),
            'availability' => $request->availability,
            'price_per_m3' => $request->price_per_m3,
            'unit' => $request->unit,
            'status' => $request->status,
        ]);

        return redirect('/product')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambar jika ada
        if ($product->image && Storage::disk('public')->exists(str_replace('storage/', '', $product->image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->image));
        }

        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Helper untuk parsing JSON spesifikasi (jika bukan array valid).
     */
    private function parseSpecification($spec)
    {
        if (empty($spec)) {
            return [];
        }

        $decoded = json_decode($spec, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : [];
    }
}
