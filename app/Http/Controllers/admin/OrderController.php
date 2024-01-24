<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // make filtering by status, course_name, user_name, date, order_unique, promo_code
        $orders = Order::query();
        if ($request->has('status')) {
            $orders = $orders->where('status', $request->status);
        }
        if ($request->has('course_name')) {
            $orders = $orders->whereHas('course', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->course_name . '%');
            });
        }
        if ($request->has('user_name')) {
            $orders = $orders->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->user_name . '%');
            });
        }
        if ($request->has('date')) {
            $orders = $orders->where('created_at', 'like', '%' . $request->date . '%');
        }
        if ($request->has('order_unique')) {
            $orders = $orders->where('order_unique', 'like', '%' . $request->order_unique . '%');
        }
        if ($request->has('promo_code')) {
            $orders = $orders->whereHas('promoCode', function ($query) use ($request) {
                $query->where('code', 'like', '%' . $request->promo_code . '%');
            });
        }
        $orders = $orders->orderBy('id', 'DESC')->paginate(20);
        return view('admin.orders.index', compact('orders', 'request'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $order->load('user', 'course', 'promoCode');
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::where(['id' => $id, 'order_unique' => $request->order_unique, 'course_id' => $request->course_id])->firstOrFail();
        $order->update(['status' => $request->status]);
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
