<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeletedClientRequest extends Model
{
    protected $fillable = [
        'original_id',
        'client_name',
        'service',
        'priority',
        'status',
        'description',
        'deleted_by',
        'deleted_at',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
