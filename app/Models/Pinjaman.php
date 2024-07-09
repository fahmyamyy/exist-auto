<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';

    protected $fillable = [
        'id',
        'user_id',
        'nama_pemilik_rekening',
        'bank',
        'no_rek',
        'tenor',
        'pinjaman_pokok',
        'total_pinjaman',
        'status'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTotalPinjamanAttribute($value)
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }
    
    public function getPinjamanPokokAttribute($value)
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }
}
