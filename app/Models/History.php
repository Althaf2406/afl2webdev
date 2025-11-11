<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    // use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'jumlah_pembelian',
        'alamat_pengiriman',
        'catatan',
        'bukti_bayar'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
