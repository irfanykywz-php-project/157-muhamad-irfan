<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 'Rp '. ReadableNumber($value, '.'),
        );
    }

    protected function destination(): Attribute
    {
        return Attribute::make(
            get: function(string $value){
                $length = strlen($value) - floor(strlen($value) / 2);
                $start = floor($length / 2);
                $replacement = str_repeat('*', $length);
                return substr_replace($value, $replacement, $start, $length);
            }
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableDate($value),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableDate($value) . ' ' . ReadableTime($value, true),
        );
    }

}
