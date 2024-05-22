<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $primaryKey = 'id';
    public $incrementing  = True;

    protected $fillable = [
        'user_id',
        'total',
        'method',
        'destination',
        'status',
    ];
}
