<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car_model';
    public $timestamps = false;

    protected $fillable = [
        'model',
        'car_type_id',
        'car_brand_id'
    ];

    public function carType()
    {
        return $this->belongsTo(CarType::class, 'car_type_id', 'id');
    }

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id', 'id');
    }
}
