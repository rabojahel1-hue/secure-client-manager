<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    protected $fillable = [
        'client_name',
        'service',
        'description',
        'priority',
        'status',
        'due_date',
    ];
}
