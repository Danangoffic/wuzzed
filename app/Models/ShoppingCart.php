<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\PromoCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'status', 'promo_code_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    /**
     * Get the user that owns the ShoppingCart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
