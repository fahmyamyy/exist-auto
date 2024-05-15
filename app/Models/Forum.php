<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use SoftDeletes;
    protected $table = 'forum';
    protected $fillable = [
        'id',
        'title',
        'content',
        'created_by',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
