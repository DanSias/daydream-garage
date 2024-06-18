<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'type',
        'category',
        'note',
        'make',
        'model',
        'year',
        'price',
        'title',
        'mileage',
        'city',
        'state',
        'timestamp',
        'image',
        'url',
        'latitude',
        'longitude',
        'source',
        'int',
        'status'
    ];
}
