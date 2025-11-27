<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $ip_address
 * @property string $type
 * @property string $os
 * @property int $network_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Network|null $network
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereNetworkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Server extends Model
{
    protected $fillable = ['ip_address', 'type', 'os', 'network_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Network, $this>
     */
    public function network(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Network::class);
    }
}
