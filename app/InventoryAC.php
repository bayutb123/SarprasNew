<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryAC extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruangan',
        'status',
        'type',
        'pk',
        'production_year',
        'bought_year',
        'author',
    ];

    protected $table = 'inventory_ac';

    protected $casts = [
        'production_year' => 'date',
        'bought_year' => 'date',
    ];
}
