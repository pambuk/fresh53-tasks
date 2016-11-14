<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property User user
 * @property string token
 */
class ConfirmationToken extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
