<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use SoftDeletes;

    protected $table = 'car';

    protected $fillable = [
        'id',
        'car_model_id',
        'year',
        'transmission',
        'color',
        'location',
        'price_cash',
        'price_credit',
        'price_installment',
        'mileage',
        'status',
        'seller',
        'inspection_date'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'seller');
    }

    public function getMileageAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }

    public function getPriceCashAttribute($value)
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }

    public function getPriceCreditAttribute($value)
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }

    public function getPriceInstallmentAttribute($value)
    {
        return 'Rp. ' . str_replace('.', ',', $value) . ' Juta/Bulan';
    }

    public function scopeSearch($query, $term)
    {
        $term = '%' . $term . '%';
        return $query->where(function ($query) use ($term) {
            $query->where('year', 'like', $term)
                ->orWhere('transmission', 'like', $term)
                ->orWhere('color', 'like', $term)
                ->orWhere('location', 'like', $term)
                ->orWhere('status', 'like', $term)
                // Search in related carModel for the model name
                ->orWhereHas('carModel', function ($query) use ($term) {
                    $query->where('model', 'like', $term)
                        // Search in related carType for the type
                        ->orWhereHas('carType', function ($query) use ($term) {
                            $query->where('type', 'like', $term);
                        })
                        // Search in related carBrand for the brand
                        ->orWhereHas('carBrand', function ($query) use ($term) {
                            $query->where('brand', 'like', $term);
                        });
                });
        });
    }

}
