<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'course_id',
        'quantity',
        'price',
        'total_price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
