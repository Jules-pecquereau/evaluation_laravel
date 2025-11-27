<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = ['serial_number', 'model', 'brand', 'commissioned_at', 'network_id'];

    protected $casts = [
        'commissioned_at' => 'date',
    ];

    public function network()
    {
        return $this->belongsTo(Network::class);
    }
}
