<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'downloads';
    protected $primaryKey = 'id';
    public $incrementing  = True;

    protected $fillable = [
        'owner_id',
        'file_id',
        'ip',
        'is_valid',
        'reveneu',
    ];
}
