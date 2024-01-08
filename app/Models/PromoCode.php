<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount', 'valid_at', 'expired_at', 'max_usage', 'usage', 'status'
    ];

    protected $dates = ['valid_at', 'expired_at'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('valid_at', '<=', now())
            ->where('expired_at', '>=', now());
    }

    // validate promo code and validate if it still active and still not expired
    public static function validatePromoCode($code)
    {
        $promoCode = PromoCode::where('code', $code)->where('status', 'active')->where('valid_at', '<=', now())->where('expired_at', '>=', now())->first();
        if($promoCode){
            if($promoCode->usage < $promoCode->max_usage){
                return $promoCode;
            }
        }
        return false;
    }

    // add counter promo code usage and update status if max usage reached
    public static function updatePromoCodeUsage($promoCode)
    {
        $promoCode = PromoCode::where('code', $code)->first();
        $promoCode->usage++;
        if($promoCode->usage >= $promoCode->max_usage){
            $promoCode->status = 'inactive';
        }
        $promoCode->save();
        return $promoCode;
    }
}
