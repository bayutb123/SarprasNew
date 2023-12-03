<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorCleanPeriod extends Model
{
    use HasFactory;

    protected $table = 'outdoor_clean_period';
    protected $fillable = [
        'month',
        'year',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
