<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';
    public $incrementing  = True;

    protected $fillable = [
        'user_id',
        'total',
        'method',
        'destination',
        'status',
    ];


    /**
     * mutator
     */
    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 'Rp '. ReadableNumber($value, '.'),
        );
    }

    public function destinationHide($value)
    {
        $length = strlen($value) - floor(strlen($value) / 2);
        $start = floor($length / 2);
        $replacement = str_repeat('*', $length);
        return substr_replace($value, $replacement, $start, $length);
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


    /**
     * relation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
