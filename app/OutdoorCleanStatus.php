<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorCleanStatus extends Model
{
    use HasFactory;

    protected $table = 'outdoor_clean_status';

    protected $fillable = [
        'name',
        'status',
        'date',
        'author',
        'period_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
