<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $label
 * @property string $lan
 * @property bool $is_out_of_service
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Computer> $computers
 * @property-read int|null $computers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Server> $servers
 * @property-read int|null $servers_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network whereIsOutOfService($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network whereLan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Network whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Network extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'lan', 'is_out_of_service'];

    protected $casts = [
        'is_out_of_service' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Computer, $this>
     */
    public function computers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Computer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Server, $this>
     */
    public function servers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Server::class);
    }
}
