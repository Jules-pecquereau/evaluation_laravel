<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = ['ip_address', 'type', 'os', 'network_id'];

    public function network()
    {
        return $this->belongsTo(Network::class);
    }
}
