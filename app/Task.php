<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description', 'estimated_end'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
