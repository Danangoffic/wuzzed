<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\ShoppingCart;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'profession'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all of the enrollments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the mentor associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }

    /**
     * Get all of the shoppingCart for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class, 'user_id', 'id');
    }


}
