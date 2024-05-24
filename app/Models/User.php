<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * mutation
     */
    public function photoUrl($photo)
    {
        if (!str_contains($photo, 'photo/')){
            return asset('assets/'.$photo);
        }
        return url('storage/'.$photo);
    }

    /**
     * relation
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(Files::class, 'user_id');
    }

    public function role($role_name)
    {
        $role = $this->belongsTo(Roles::class, 'role_id', 'id')->first('name');

        if ($role['name'] == $role_name){
            return true;
        }
    }

}
