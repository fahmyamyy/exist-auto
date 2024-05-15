<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'car_id',
        'buyer_id',
        'amount',
        'recipient',
        'address',
        'status',
        'transaction_type'
    ];

    protected $casts = [
        'id' => 'string',
        'car_id' => 'string',
        'buyer_id' => 'string',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'upload_id', 'id');
    }

    public function getAmountAttribute($value)
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }
}
