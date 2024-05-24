<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    /**
     * mutator
     */
    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableDate($value),
        );
    }

    protected function totalDownload(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableNumber($value, '.'),
        );
    }

    protected function totalReveneu(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableNumber($value, '.'),
        );
    }

    /**
     * relation
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
