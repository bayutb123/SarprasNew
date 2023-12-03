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
        'statusw1',
        'statusw2',
        'statusw3',
        'statusw4',
        'statusw1date',
        'statusw2date',
        'statusw3date',
        'statusw4date',
        'date',
        'author',
        'period_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
