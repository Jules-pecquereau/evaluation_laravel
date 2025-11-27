<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $fillable = ['label', 'lan', 'is_out_of_service'];

    protected $casts = [
        'is_out_of_service' => 'boolean',
    ];

    public function computers()
    {
        return $this->hasMany(Computer::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }
}
