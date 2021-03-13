<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenBlacklist extends Model
{
    protected $fillable = [
        'jwt_token'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
