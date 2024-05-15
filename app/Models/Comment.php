<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comment';

    protected $fillable = [
        'id',
        'forum_id',
        'comment',
        'created_by'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
