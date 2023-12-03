<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorCleanHistory extends Model
{
    use HasFactory;

    protected $table = 'outdoor_clean_history';
    protected $fillable = [
        'outdoor_clean_status_id',
        'name',
        'status',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

}
