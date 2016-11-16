<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_PENDING = false;
    const STATUS_FINISHED = true;

    protected $fillable = ['description', 'estimated_end', 'status'];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
