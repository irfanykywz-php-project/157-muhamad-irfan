<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRelationships, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
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
    public function reveneu(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => 'Rp '. ReadableNumber($value, '.')
        );
    }

    public function photoUrl($photo)
    {
        // when photo is url > its a from google login
        if (filter_var($photo, FILTER_VALIDATE_URL)){
            return $photo;
        // when photo is default
        }elseif (!str_contains($photo, 'photo/')){
            return asset('assets/'.$photo);
        }

        // return photo uploaded
        return url('storage/'.$photo);
    }

    /**
     * relation
     */
    public function downloads()
    {
        return $this->hasMany(Download::class, 'owner_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'user_id');
    }

    public function role($role_name)
    {
        $role = $this->belongsTo(Role::class, 'role_id', 'id')->first('name');

        if ($role['name'] == $role_name){
            return true;
        }
    }

}
