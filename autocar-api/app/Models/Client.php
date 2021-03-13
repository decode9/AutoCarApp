<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'email',
        'phone_number',
        'concessionaire_id',
        'status'
    ];

    public function Concessionaire()
    {
        return $this->belongsTo(Concessionaire::class);
    }
}
