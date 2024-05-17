<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Files extends Model
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
}
