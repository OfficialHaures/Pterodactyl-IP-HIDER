<?php

namespace ActivityIpHider\Models;

use Illuminate\Database\Eloquent\Model;
use Pterodactyl\Models\ActivityLog;

class ActivityIp extends Model
{
    protected $table = 'activity_ips';

    protected $fillable = [
        'activity_id',
        'ip_address'
    ];

    public function activity()
    {
        return $this->belongsTo(ActivityLog::class, 'activity_id');
    }
}
