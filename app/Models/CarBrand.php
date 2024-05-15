<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $table = 'car_brand';

    public $timestamps = false;

    protected $fillable = ['brand'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class, 'car_brand_id');
    }
}
