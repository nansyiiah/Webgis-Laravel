<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_name',
        'address',
        'street',
        'city',
        'state',
        'lat',
        'long',
        'url',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
}
