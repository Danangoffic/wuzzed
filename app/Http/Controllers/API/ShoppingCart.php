<?php

namespace App\Http\Controllers\API;

use App\Models\PromoCode;
use App\Models\ShoppingCart as Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingCart extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    {
        // get student shopping cart
        if($request->user()->role == 'student'){
            $shoppingCart = Cart::with('course')
                            ->where(['user_id'=> auth()->user()->id, 'status' => 'Belum Checkout '])
                            ->orderBy('id', 'DESC')
                            ->get();
            return response()->json($shoppingCart, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Contoh penggunaan shopping cart
        $userId = $request->user()->id; // Gantilah dengan ID pengguna yang sesuai
        $courseId = $request->post('course_id'); // Gantilah dengan ID kursus yang sesuai

        // Tambahkan item ke shopping cart
        $shoppingCart = ShoppingCart::create([
            'user_id' => $userId,
            'course_id' => $courseId,
            'status' => 'Belum Checkout',
        ]);

        // Menggunakan promo code jika ada
        $promoCode = $request->post('promo_code');
        $promo_data = PromoCode::validatePromoCode(promoCode);
        if($promo_data){
            $promoCodeId = $promo_data->id; // Gantilah dengan ID promo code yang sesuai
            $shoppingCart->update(['promo_code_id' => $promoCodeId]);
        }

        // Checkout atau melakukan proses pembelian
        $shoppingCart->update(['status' => 'Sudah Checkout']);

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user_id = $request->user()->id;
        $shoppingCart = Cart::with('course')
                        ->where(['user_id'=> $user_id, 'status' => 'Belum Checkout '])
                        ->orderBy('id', 'DESC')
                        ->get();
        return response()->json($shoppingCart, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        if($cart){
            $cart->delete();
            $carts_list = Cart::where(['user_id' => $cart->user_id, 'status' => 'Belum Checkout'])->orderBy('id', 'DESC')->get();
            return response()->json(['data' => $carts_list,'message' => 'Cart deleted successfully'], 200);
        }else{
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }
}
