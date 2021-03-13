<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concessionaire extends Model
{
    use HasFactory;

    protected $table = 'concessionaires';

    protected $fillable = [
        'name',
        'direction',
        'code',
        'region_id'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
}
