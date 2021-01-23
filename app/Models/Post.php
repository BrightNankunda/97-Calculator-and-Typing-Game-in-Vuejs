<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'location',
        'floor',
        'rooms',
        'address',
        'contact',
        'rentfee',
        'content',
        'amount'
    ];
}
