<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUpdate extends Model
{
    use HasFactory;
    
    protected $table = 'request_updates';

    protected $fillable = [
        'maintenance_request_id',
        'status',
        'note',
        'updated_by',
    ];

    public function maintenanceRequest()
    {
        return $this->belongsTo(MaintenanceRequest::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
