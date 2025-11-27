<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $serial_number
 * @property string $model
 * @property string $brand
 * @property \Illuminate\Support\Carbon $commissioned_at
 * @property int $network_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Network|null $network
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereCommissionedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereNetworkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Computer whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Computer extends Model
{
    protected $fillable = ['serial_number', 'model', 'brand', 'commissioned_at', 'network_id'];

    protected $casts = [
        'commissioned_at' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Network, $this>
     */
    public function network(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Network::class);
    }
}
