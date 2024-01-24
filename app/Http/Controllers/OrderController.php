<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data_request = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'promo_code' => 'nullable|string',
        ]);
        $user_id = $request->user()->id;
        $data_request['user_id'] = $user_id;

        // Hitung total amount
        $course = Course::firstOrFail($data_request['course_id']);
        // validasi jenis course dan apakah masih pada tanggal early bird

        if($course->jenis == 'live'){
            $total_amount = $course->early_bird_price;
            if($course->early_bird_end > now() || $course->early_bird_start < now()){
                $total_amount = $course->price;
            }
        }
        $total_amount = $course->price;
        $promo_code = PromoCode::where('code', $data_request['promo_code'])->first();
        $data['message'] = 'success';
        if($promo_code == null){
            $data['message'] = 'promo code tidak valid';
        }else if ($promo_code->valid_at >= now() && $promo_code->expired_at <= now()) {
            $data_request['promo_code_id'] = $promo_code->id;
            $total_amount -= $promo_code->discount;
        }else{
            $data['message'] = 'promo code Expired';
        }
        $data_request['order_unique'] = 'wco-' . Str::uuid()->toString();
        $data_request['total_amount'] = $total_amount;
        $order = Order::create($data_request);
        $order->orderItems()->create([
            'course_id' => $data_request['course_id'],
            'quantity' => 1,
            'price' => $total_amount,
            'total_price' => $total_amount
        ]);
        $order->load(
            'orderItems.course',
            'orderItems.course.category'
        );

        return response()->json([
            'message' => 'Order berhasil dibuat.',
            'order' => $order
        ]);
    }
}
