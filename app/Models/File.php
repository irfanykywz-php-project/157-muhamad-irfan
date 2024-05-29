<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id';
    public $incrementing  = True;

    protected $fillable = [
        'user_id',
        'name',
        'ext',
        'size',
        'path',
        'code',
        'description',
        'password',
        'downloaded',
        'viewed'
    ];

    /**
     * mutator
     */
    protected function size(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableSize($value),
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableDate($value),
        );
    }

    protected function downloaded(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ReadableNumber($value, '.'),
        );
    }


    /**
     * increment
     */
    public function downloadedIncrement()
    {
        $this->downloaded++;
        return $this->save();
    }

    public function viewedIncrement()
    {
        $this->viewed++;
        return $this->save();
    }


    /**
     * Relation
     */
    public function downloads()
    {
        return $this->hasMany(Download::class, 'file_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
