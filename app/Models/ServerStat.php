<?php

namespace Azuriom\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $server_id
 * @property int $players
 * @property int|null $ram
 * @property int|null $cpu
 * @property int|null $tps
 * @property float|null $loaded_chunks
 * @property int|null $entities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Azuriom\Models\Server $server
 */
class ServerStat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'players', 'ram', 'cpu', 'tps', 'loaded_chunks', 'entities',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
