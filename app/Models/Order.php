<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\OrderItem;
use App\Models\PromoCode;
use App\Models\TransactionHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'total_amount',
        'status',
        'promo_code_id',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relasi dengan promo code
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    // order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
