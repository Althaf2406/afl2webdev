<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function storeOrder(Request $request, $id)
    {
        $userId = Auth::id();
        History::create([
            'user_id' => $userId,
            'product_id' => $id,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'catatan' => $request->catatan,
            'bukti_bayar' => $request->file('bukti_bayar')->store('buktibayar', 'public'),
        ]);
        
        return redirect('/profile');
    }
}
