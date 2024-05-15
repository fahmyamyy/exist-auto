<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $table = 'car_type';

    public $timestamps = false;

    protected $fillable = ['type'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class, 'car_type_id');
    }
}
